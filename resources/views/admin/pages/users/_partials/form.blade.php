@csrf
@include('admin.includes.alerts')
<div class="class-form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $user->name ?? old('name') }}">
</div>
<div class="class-form-group">
    <label>* E-mail:</label>
    <input type="email" name="email" class="form-control" placeholder="E-mail:" value="{{ $user->email ?? old('email') }}">
</div>
<div class="class-form-group">
    <label>* Senha:</label>
    <input type="password" name="password" class="form-control" placeholder="Senha:">
</div>
<div class="class-form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
