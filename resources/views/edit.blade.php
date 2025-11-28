Nome: <input type="text" name="nome" value="{{ $pacote->nome }}"><br><br>
Descrição: <textarea name="descricao">{{ $pacote->descricao }}</textarea><br><br>
Preço: <input type="text" name="preco" value="{{ $pacote->preco }}"><br><br>
Duração (dias): <input type="number" name="duracao" value="{{ $             pacote->duracao }}"><br><br>
<input type="submit" value="Atualizar Pacote">