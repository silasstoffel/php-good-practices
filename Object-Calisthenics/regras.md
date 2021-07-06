## Regras

1. Não usar getter setters
   1.1 Tell, don't ask
   Objetivo aqui é apenas expor acesso metodos que fazem sentido, em algum casos da para eliminar getters/settes e expor acesso a informação com metodo que fazem sentido ao negócio. Nesse caso do projeto de exemplo  apenas criamos metodos que retorna se o vídeo é público, que usa a classe não precisa pegar a visiblidade e conferir com constante que diz se pública ou não. Em casos que get/ser pode recuperar e alterar valor temos um falso encapsulamento é melhor lagar público.
