<form action="{{ route('pacotes.store') }}" method="POST">
    @csrf
    Nome: <input type="text" name="nome"><br><br>

    Continente: <input type="text" name="continente"><br><br>

    País: <input type="text" name="pais"><br><br>

    Descrição: <textarea name="descricao"></textarea><br><br>

    Preço: <input type="number" step="0.01" name="preco"><br><br>

    Data Início: <input type="date" name="data_inicio"><br><br>

    Data Fim: <input type="date" name="data_fim"><br><br>

    <button type="submit">Salvar</button>
</form>
