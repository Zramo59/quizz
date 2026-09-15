import { useLocation, useNavigate } from "react-router-dom";

interface ResultsState {
  score: number;
  total: number;
  categorie: string;
}

function messageFor(ratio: number) {
  if (ratio === 1) return "Score parfait, bravo ! 🏆";
  if (ratio >= 0.7) return "Très bon score ! 🎉";
  if (ratio >= 0.4) return "Pas mal, continue comme ça ! 💪";
  return "Peut mieux faire, retente ta chance ! 🔁";
}

export function Results() {
  const location = useLocation();
  const navigate = useNavigate();
  const state = location.state as ResultsState | null;

  if (!state) {
    return (
      <div className="page page--center">
        <p className="status-text">Aucun résultat à afficher.</p>
        <button type="button" className="primary-button" onClick={() => navigate("/")}>
          Retour à l'accueil
        </button>
      </div>
    );
  }

  const { score, total, categorie } = state;
  const ratio = total > 0 ? score / total : 0;

  return (
    <div className="page page--center">
      <h1 className="page-title">Résultats</h1>
      <p className="results__category">Catégorie : {categorie}</p>
      <p className="results__score">
        {score} / {total}
      </p>
      <p className="results__message">{messageFor(ratio)}</p>

      <div className="results__actions">
        <button type="button" className="primary-button" onClick={() => navigate("/categories")}>
          Rejouer
        </button>
        <button type="button" className="secondary-button" onClick={() => navigate("/")}>
          Accueil
        </button>
      </div>
    </div>
  );
}
