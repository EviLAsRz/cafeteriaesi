<!-- 
// Programmer 1: Mr. Lai Pin Cheng, Developer
// Description: Edit menu details (Admins can edit menu details)
// Edited on: 14 April 2022
-->

@extends(( auth()->user()->role == 'customer' ) ? 'layouts.app' : 'layouts.backend' )

@section('links')
<link href="{{ asset('css/menu.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('bodyID')
{{ 'menu' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ URL('http://127.0.0.1:8000/images/Black%20Logo.png') }}@endsection

@section('content')
<form method='post' action="{{ route('updateMenuDetails') }}" class="px-4 py-3" style="min-width: 350px">
    @csrf
    <input name="menuID" type="hidden" value="{{ $menu['id'] }}">

    <div class="mb-2">
        <label for="ItemType" class="form-label">Item Type</label>
        <div class="input-group mb-3">
            <label class="input-group-text" for="itemTypeInputGroup">Type:</label>
            <select name="menuType" class="form-select" id="itemTypeInputGroup" >
                <option selected>{{ $menu['type'] }}</option>
                <option name="menuType" value="Bocadillo">Bocadillo</option>
                <option name="menuType" value="Dulce">Dulce</option>
                <option name="menuType" value="Pan">Pan</option>
                <option name="menuType" value="Extra">Extra</option>
                <option name="menuType" value="Aperitivo">Aperitivo</option>
                <option name="menuType" value="Plato_primero">Primer plato</option>
                <option name="menuType" value="Plato_segundo">Segundo plato</option>
                <option name="menuType" value="Bebidas">Bebidas</option>
            </select>
        </div>
    </div>
    
    <div class="dropdown-divider"></div>

    <div class="mb-1">
        <label for="ItemName" class="form-label">Item Name</label>
        <div class="input-group mb-3">
            <input name="menuName" type="text" class="form-control" placeholder="Name" aria-label="Item Name" value="{{ $menu['name'] }}" required>
        </div>
    </div>

    <div class="dropdown-divider"></div>

    <div class="mb-1">
        <label for="ItemPrice" class="form-label">Item Price</label>
        <div class="input-group mb-3">
            <span class="input-group-text">RM</span>
            <input name="menuPrice" type="number" min=0 step=0.01 class="form-control price-class" class="form-control" placeholder="Price" aria-label="Item Price" value="{{ $menu['price'] }}" required>
            <span class="validity"></span>
        </div>
    </div>

    <div class="dropdown-divider"></div>

    <div class="mb-1">
        <label for="ItemCost" class="form-label">Item Estimated Cost</label>
        <div class="input-group mb-3">
            <span class="input-group-text">RM</span>
            <input name="menuEstCost" type="number" min=0 step=0.01 class="form-control price-class" class="form-control" placeholder="Cost" aria-label="Item Cost" value="{{ $menu['estCost'] }}" required>
            <span class="validity"></span>
        </div>
    </div>

    <div class="dropdown-divider"></div>

    <div class="mb-1">
        <label for="ItemDescription" class="form-label">Item Description</label>
        <div class="input-group mb-3">
            <textarea name="menuDescription" class="form-control" placeholder="Description" aria-label="Item Description" required>{{ $menu['description'] }}</textarea>
        </div>
    </div>

    <div class="dropdown-divider"></div>
    
    <div class="mb-2">
        <label for="ItemSize" class="form-label">Portion</label>
        <div class="input-group mb-3">
            <label class="input-group-text" for="itemSizeInputGroup">Size:</label>
            <select name="menuSize" class="form-select" id="itemSizeInputGroup">
                <option selected>{{ $menu->size }}</option>
                @if($menu['size'] == "1-2")
                @else
                    <option name="menuSize" value="1-2">1 - 2 People</option>
                @endif
                @if($menu['size'] == "3-4")
                @else
                    <option name="menuSize" value="3-4">3 - 4 People</option>
                @endif
                @if($menu['size'] == ">5")
                @else
                    <option name="menuSize" value=">5">>5 People</option>
                @endif
            </select>
        </div>
    </div>

    <div class="dropdown-divider"></div>
    <div class="row">
        <div>
            <button type="submit" class="btn btn-outline-success">Save Changes</button>
            <a href={{ url()->previous() }}><button type="button" class="btn btn-outline-danger">Back</button></a>
        </div>
    </div>
</form>
@endsection