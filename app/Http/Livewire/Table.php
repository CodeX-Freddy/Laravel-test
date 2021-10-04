<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\produit;
use Livewire\Component;

class Table extends Component
{
    public string $name = "";
    public string $description = "";
    public int $prix = 1000;

    public $close = false;

    public $idE = 0;
    public string $nameE = "";
    public string $descriptionE = "";
    public int $prixE = 0;

    public function add(){
        produit::create([
            'name' => $this->name,
            'description' => $this->description,
            'prix' => $this->prix,
            'image' => "image",
            'user_id' => auth()->user()->id,
        ]);
    }

    public function close(){
        $this->close = false;
    }
    public function edit($id){
        $this->close = true;
        $this->idE = $id;
        $prod = produit::find($this->idE);
        $this->nameE = $prod->name;
        $this->descriptionE = $prod->description;
        $this->prixE = $prod->prix;
        
    }

    public function editSave(){
        produit::where('id', $this->idE)
              ->update([
                  'name' => $this->nameE,
                  'description' => $this->descriptionE,
                  'prix' => $this->prixE
                  ]);

        $this->close();
    }

    public function delete($id){
        produit::where('id', $id)
        ->delete();
    }
    public function render()
    {
        $produits = produit::all();
        return view('livewire.table', compact('produits'));
    }
}
