import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { fetchCategories } from "../api/client";
import { CategoryCard } from "../components/CategoryCard";
import type { Category } from "../types";

export function Categories() {
  const navigate = useNavigate();
  const [categories, setCategories] = useState<Category[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    fetchCategories()
      .then(setCategories)
      .catch(() => setError("Impossible de charger les catégories."))
      .finally(() => setLoading(false));
  }, []);

  function handleSelect(category: Category) {
    navigate(`/quiz/${encodeURIComponent(category.categorie)}`);
  }

  return (
    <div className="page">
      <h1 className="page-title">Choisis une catégorie</h1>

      {loading && <p className="status-text">Chargement des catégories…</p>}
      {error && <p className="status-text status-text--error">{error}</p>}

      {!loading && !error && categories.length === 0 && (
        <p className="status-text">Aucune catégorie disponible pour le moment.</p>
      )}

      <div className="category-grid">
        {categories.map((category) => (
          <CategoryCard key={category.id} category={category} onSelect={handleSelect} />
        ))}
      </div>
    </div>
  );
}
