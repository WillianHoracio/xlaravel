<?php
    namespace App\Http\Controllers;
    
    use App\Models\Ingredient;
    use App\Http\Requests\StoreIngredientRequest;
    use App\Http\Requests\UpdateIngredientRequest;
    use Illuminate\Http\Request;

    class IngredientController extends Controller
    {
        public function index()
        {
            $ingredients = Ingredient::all();
            return view('ingredients.index',['ingredients' => $ingredients]);
        }

        public function create()
        {
            return view('ingredients.create');
        }

        public function store(StoreIngredientRequest $request)
        {       
            try
            {
                Ingredient::create($request->validated());
                return redirect()->route('ingredients.index');    
            }
            catch (\Exception $e)
            {
                return redirect()->back()->with('error', 'Erro ao cadastrar: ' . $e->getMessage());
            }
            
        }

        public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
        {
            try
            {
                $ingredient->fill($request->validated());
                $ingredient->save();

                return redirect()->route('ingredients.index');
            }
            catch (\Exception $e)
            {
                return redirect()->back()->with('error', 'Erro ao atualizar: ' . $e->getMessage());
            }
        }

        public function destroy(Ingredient $ingredient)
        {            
            $ingredient->delete();
            return redirect()->route('ingredients.index');
        }

        public function show(Ingredient $ingredient, Request $request)
        {
            $readOnly = filter_var($request->query('blocked'), FILTER_VALIDATE_BOOLEAN);
            
            if (!$ingredient) {
                return redirect()->route('ingredients.index')
                    ->with('error', 'Ingrediente não encontrado');
            }            

            return view('ingredients.show', [
                'ingredient' => $ingredient,
                'readOnly'   => $readOnly
            ]);
        }
    }

