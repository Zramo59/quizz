import { Route, Routes } from "react-router-dom";
import { Home } from "./pages/Home";
import { Categories } from "./pages/Categories";
import { Quiz } from "./pages/Quiz";
import { Results } from "./pages/Results";

function App() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/categories" element={<Categories />} />
      <Route path="/quiz/:categorie" element={<Quiz />} />
      <Route path="/resultats" element={<Results />} />
    </Routes>
  );
}

export default App;
