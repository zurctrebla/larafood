@csrf
@include('admin.includes.alerts')

<div class="class-form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $profile->name ?? old('name') }}">
</div>
<div class="class-form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $plan->description ?? old('description') }}">
</div>
<div class="class-form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
