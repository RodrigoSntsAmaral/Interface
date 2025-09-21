<?php

/* Qual é a finalidade da BoletoInterface neste sistema? Por que é importante usá-la?
Definir regras obrigatórias.
Isso garante que todas as implementações de boleto, tenham os mesmos métodos básicos. *\

/* Explique por que a classe BoletoAbstrato precisa ser declarada como abstract. O que aconteceria
se ela não fosse abstrata?
A classe não implementa todos os métodos da interface BoletoInterface, ela delega para as subclasses a implementação, Ou seja, sozinha, ela não pode gerar um boleto real.
Se implementasse todos os métodos para que ela deixasse de ser abstrata, então seria possível instanciá-la,
mas isso quebraria a ideia do design, porque BoletoAbstrato não representa um boleto real, apenas um modelo base. *\

/* O método renderizar() é implementado na classe abstrata, mas delega a execução para métodos
abstratos. Qual é a vantagem dessa abordagem em termos de reuso e manutenção?
Essa abordagem centraliza a lógica comum na classe abstrata e delega a lógica específica para as subclasses.
Assim, tem menos repetição, mais reuso e manutenção facilitada. *\