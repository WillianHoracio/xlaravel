<?php
    namespace App\Http\Controllers;
    
    use App\Models\Ingredient;
    use App\Http\Requests\StoreIngredientRequest;
    use Illuminate\Http\Request;

    class IngredientController extends Controller{

        public function index(){
            $ingredients = Ingredient::all();
 
            return view('ingredients.index',['ingredients' => $ingredients]);
        }

        public function store(StoreIngredientRequest $request){
            
            Ingredient::create([
                'name'        => $request->name,
                'description' => $request->description,
                'unit'        => $request->unit,
                'active'      => $request->active ?? false,
            ]);

            return redirect()->route('ingredients.index');
        }

        public function create(){
            return view('ingredients.create');
        }

        public function destroy(Ingredient $ingredient){
            $ingredient->delete();
            return redirect()->route('ingredients.index');
        }

        public function show(Ingredient $ingredient, Request $request){
            $readOnly = filter_var($request->query('blocked'), FILTER_VALIDATE_BOOLEAN);
            $ingredient = Ingredient::find($ingredient->id);
            
            if (!$ingredient) {
                return redirect()->route('ingredients.index')->with('error', 'Ingredient not found');
            }            

            return view('ingredients.show', [
                'ingredient' => $ingredient,
                'readOnly'   => $readOnly
            ]);
        }

        public function update(Request $request, Ingredient $ingredient){
            $ingredient->update([
                'name'        => $request->name,
                'description' => $request->description,
                'unit'        => $request->unit,
                'active'      => $request->active ?? false,
            ]);

            return redirect()->route('ingredients.index');
        }
    }


