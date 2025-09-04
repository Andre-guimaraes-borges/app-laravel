<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Cadastrar Cliente</h2>
        <form action="{{ route('client.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" id="cep" name="cep" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" id="endereco" name="endereco" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" id="numero" name="numero" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" id="bairro" name="bairro" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="uf" class="form-label">UF</label>
                <input type="text" id="uf" name="uf" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('client.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
    <script>
    document.getElementById('cep').addEventListener('blur', function() {
        alert('Buscando endereço para o CEP: ' + this.value);
        var cep = this.value.replace(g, '');
        if (cep.length === 8) {
            fetch(`/buscar-cep?cep=${cep}`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('endereco').value = data.logradouro || '';
                        document.getElementById('bairro').value = data.bairro || '';
                        document.getElementById('cidade').value = data.localidade || '';
                        document.getElementById('uf').value = data.uf || '';
                    } else {
                        alert('CEP não encontrado!');
                    }
                })
                .catch(() => alert('Erro ao buscar CEP!'));
        }
    });
    </script>
</body>
</html>