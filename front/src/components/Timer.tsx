interface TimerProps {
  secondsLeft: number;
  totalSeconds: number;
}

export function Timer({ secondsLeft, totalSeconds }: TimerProps) {
  const ratio = Math.max(secondsLeft / totalSeconds, 0);
  const isUrgent = secondsLeft <= 10;

  return (
    <div className="timer" aria-live="polite">
      <div className="timer__bar-track">
        <div
          className={`timer__bar-fill ${isUrgent ? "timer__bar-fill--urgent" : ""}`}
          style={{ width: `${ratio * 100}%` }}
        />
      </div>
      <span className={`timer__value ${isUrgent ? "timer__value--urgent" : ""}`}>
        {secondsLeft}s
      </span>
    </div>
  );
}
