import { useNavigate } from "react-router-dom";
import { Logo } from "../components/Logo";

export function Home() {
  const navigate = useNavigate();

  return (
    <div className="page page--center" onClick={() => navigate("/categories")}>
      <Logo size={120} />
      <h1 className="app-title">Culture Quiz</h1>
      <p className="home__hint">Touchez l'écran pour commencer</p>
    </div>
  );
}
