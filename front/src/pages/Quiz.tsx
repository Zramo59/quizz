import { useCallback, useEffect, useRef, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import { fetchQuizForCategory } from "../api/client";
import { AnswerButton, type AnswerState } from "../components/AnswerButton";
import { Timer } from "../components/Timer";
import type { QuizQuestion } from "../types";

const QUESTION_SECONDS = 30;
const REVEAL_DELAY_MS = 1200;

export function Quiz() {
  const { categorie = "" } = useParams<{ categorie: string }>();
  const navigate = useNavigate();

  const [questions, setQuestions] = useState<QuizQuestion[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const [currentIndex, setCurrentIndex] = useState(0);
  const [score, setScore] = useState(0);
  const [selected, setSelected] = useState<string | null>(null);
  const [answered, setAnswered] = useState(false);
  const [secondsLeft, setSecondsLeft] = useState(QUESTION_SECONDS);

  const advanceTimeoutRef = useRef<ReturnType<typeof setTimeout> | null>(null);
  const intervalRef = useRef<ReturnType<typeof setInterval> | null>(null);

  useEffect(() => {
    fetchQuizForCategory(categorie)
      .then((qs) => {
        if (qs.length === 0) {
          setError("Aucune question disponible pour cette catégorie.");
        }
        setQuestions(qs);
      })
      .catch(() => setError("Impossible de charger les questions."))
      .finally(() => setLoading(false));
  }, [categorie]);

  const goToNext = useCallback(
    (finalScore: number) => {
      setCurrentIndex((prevIndex) => {
        const next = prevIndex + 1;
        if (next >= questions.length) {
          navigate("/resultats", {
            replace: true,
            state: { score: finalScore, total: questions.length, categorie },
          });
          return prevIndex;
        }
        return next;
      });
    },
    [questions.length, navigate, categorie],
  );

  // Reset per-question state and (re)start the countdown whenever the question changes.
  useEffect(() => {
    if (questions.length === 0) return;

    setSelected(null);
    setAnswered(false);
    setSecondsLeft(QUESTION_SECONDS);

    const start = Date.now();
    intervalRef.current = setInterval(() => {
      const elapsed = Math.floor((Date.now() - start) / 1000);
      const left = Math.max(QUESTION_SECONDS - elapsed, 0);
      setSecondsLeft(left);
    }, 250);

    return () => {
      if (intervalRef.current) clearInterval(intervalRef.current);
      if (advanceTimeoutRef.current) clearTimeout(advanceTimeoutRef.current);
    };
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [currentIndex, questions.length]);

  // Handle the timer running out without an answer.
  useEffect(() => {
    if (secondsLeft > 0 || answered || questions.length === 0) return;
    setAnswered(true);
    if (intervalRef.current) clearInterval(intervalRef.current);
    advanceTimeoutRef.current = setTimeout(() => goToNext(score), 400);
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [secondsLeft, answered, questions.length]);

  function handleAnswerClick(answer: string) {
    if (answered) return;
    const current = questions[currentIndex];
    const isCorrect = answer === current.correctAnswer;

    setSelected(answer);
    setAnswered(true);
    if (intervalRef.current) clearInterval(intervalRef.current);

    const newScore = isCorrect ? score + 1 : score;
    if (isCorrect) setScore(newScore);

    advanceTimeoutRef.current = setTimeout(() => goToNext(newScore), REVEAL_DELAY_MS);
  }

  function answerState(answer: string): AnswerState {
    if (!answered) return "idle";
    const current = questions[currentIndex];
    if (answer === selected) {
      return answer === current.correctAnswer ? "correct" : "incorrect";
    }
    if (answer === current.correctAnswer && selected !== null) {
      return "reveal";
    }
    return "idle";
  }

  if (loading) {
    return (
      <div className="page page--center">
        <p className="status-text">Chargement du quiz…</p>
      </div>
    );
  }

  if (error || questions.length === 0) {
    return (
      <div className="page page--center">
        <p className="status-text status-text--error">{error ?? "Aucune question."}</p>
        <button type="button" className="primary-button" onClick={() => navigate("/categories")}>
          Retour aux catégories
        </button>
      </div>
    );
  }

  const current = questions[currentIndex];

  return (
    <div className="page">
      <Timer secondsLeft={secondsLeft} totalSeconds={QUESTION_SECONDS} />

      <p className="quiz__progress">
        Question {currentIndex + 1} / {questions.length} — {current.categorie}
      </p>

      <h2 className="quiz__question">{current.question}</h2>

      <div className="answer-grid">
        {current.answers.map((answer) => (
          <AnswerButton
            key={answer}
            label={answer}
            state={answerState(answer)}
            disabled={answered}
            onClick={() => handleAnswerClick(answer)}
          />
        ))}
      </div>

      <p className="quiz__score">Score actuel : {score}</p>
    </div>
  );
}
