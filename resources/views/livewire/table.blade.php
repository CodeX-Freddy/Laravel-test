<div>

    @if($close)
    <div class="box">
        <i class='bx bx-x' wire:click="close"></i>
        <div class="ct_form_edit">
            <input type="text" placeholder="nom" wire:model="nameE">
            <input type="text" placeholder="description" wire:model="descriptionE">
            <input type="number" value="100" wire:model="prixE">
            <div class="addProduit" wire:click="editSave">
                Modifier 
            </div>
        </div>
    </div>
    @endif
    <div class="ct_form_edit">
        <input type="text" placeholder="nom" wire:model="name">
        <input type="text" placeholder="description" wire:model="description">
        <input type="number" value="100" wire:model="prix">
        <div class="addProduit" wire:click="add">
             Add 
            <i class='bx bx-plus' style='color:#2a6bd6' ></i>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Ajouté par</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
            <tr>
                <td>{{$produit->name}}</td>
                <td>{{$produit->description}}</td>
                <td>{{$produit->prix}}</td>
                <td>{{$produit->user->email}}</td>
                <td class="action">
                    <div class="edit" wire:click = "edit({{$produit->id}})"><i class='bx bxs-edit-alt'></i></div>
                    <div class="del" wire:click = "delete({{$produit->id}})"><i class='bx bxs-trash' ></i></div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
