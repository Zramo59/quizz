import type { ApiQuestion, Category, QuizQuestion } from "../types";

const API_URL = import.meta.env.VITE_API_URL ?? "http://localhost:8000/api";

async function getJson<T>(path: string): Promise<T> {
  const res = await fetch(`${API_URL}${path}`);
  if (!res.ok) {
    throw new Error(`Erreur API (${res.status}) sur ${path}`);
  }
  return res.json() as Promise<T>;
}

export function fetchCategories(): Promise<Category[]> {
  return getJson<Category[]>("/categories");
}

export function fetchQuestions(): Promise<ApiQuestion[]> {
  return getJson<ApiQuestion[]>("/questions");
}

/** Shuffle a copy of the array (Fisher-Yates). */
function shuffle<T>(items: T[]): T[] {
  const arr = [...items];
  for (let i = arr.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [arr[i], arr[j]] = [arr[j], arr[i]];
  }
  return arr;
}

/**
 * Convert a raw API question into a displayable quiz question.
 * Convention: `reponse1` is always the correct answer, `reponse2`..`reponse10`
 * are distractors. We keep the correct answer plus 3 random distractors,
 * then shuffle their display order.
 */
export function toQuizQuestion(raw: ApiQuestion): QuizQuestion {
  const correctAnswer = raw.reponse1;
  const distractors = [
    raw.reponse2,
    raw.reponse3,
    raw.reponse4,
    raw.reponse5,
    raw.reponse6,
    raw.reponse7,
    raw.reponse8,
    raw.reponse9,
    raw.reponse10,
  ].filter(Boolean);

  const pickedDistractors = shuffle(distractors).slice(0, 3);
  const answers = shuffle([correctAnswer, ...pickedDistractors]);

  return {
    id: raw.id,
    categorie: raw.categorie,
    question: raw.question,
    answers,
    correctAnswer,
  };
}

/** Fetch 10 shuffled questions for a given category. */
export async function fetchQuizForCategory(
  categorie: string,
): Promise<QuizQuestion[]> {
  const all = await fetchQuestions();
  const forCategory = all.filter((q) => q.categorie === categorie);
  const selected = shuffle(forCategory).slice(0, 10);
  return selected.map(toQuizQuestion);
}
