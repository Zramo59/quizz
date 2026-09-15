export type AnswerState = "idle" | "correct" | "incorrect" | "reveal";

interface AnswerButtonProps {
  label: string;
  state: AnswerState;
  onClick: () => void;
  disabled: boolean;
}

export function AnswerButton({ label, state, onClick, disabled }: AnswerButtonProps) {
  return (
    <button
      type="button"
      className={`answer-button answer-button--${state}`}
      onClick={onClick}
      disabled={disabled}
    >
      {label}
    </button>
  );
}
