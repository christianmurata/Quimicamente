//PADRÃO PARA MULTIPLAS INSERSÕES: POSTGRES PHPPGADMIN

//TABELA CONTEÚDO

insert into conteudos(conteudos_nome,conteudos_descricao,conteudos_ordem,conteudos_del)
values('assunto1','teste1',3,'n'),
('assunto2','teste2',4,'n'),
('assunto3','teste3',5,'n'),
('assunto4','teste4',6,'n'),
('assunto5','teste5',7,'n');

//TABELA SLIDES

insert into slides(conteudos_id,slides_ordem,slides_conteudo,slides_del)
values(3,1,'<p><strong>Lorem Ipsum</strong>&nbsp;&eacute; simplesmente uma simula&ccedil;&atilde;o de texto da ind&uacute;stria tipogr&aacute;fica e de impressos, e vem sendo utilizado desde o s&eacute;culo XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos</p>','n'),
(3,2,'<p><strong>Lorem Ipsum</strong>&nbsp;&eacute; simplesmente uma simula&ccedil;&atilde;o de texto da ind&uacute;stria tipogr&aacute;fica e de impressos, e vem sendo utilizado desde o s&eacute;culo XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos</p>','n'),
(3,3,'<p><strong>Lorem Ipsum</strong>&nbsp;&eacute; simplesmente uma simula&ccedil;&atilde;o de texto da ind&uacute;stria tipogr&aacute;fica e de impressos, e vem sendo utilizado desde o s&eacute;culo XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos</p>','n'),
(3,4,'<p><strong>Lorem Ipsum</strong>&nbsp;&eacute; simplesmente uma simula&ccedil;&atilde;o de texto da ind&uacute;stria tipogr&aacute;fica e de impressos, e vem sendo utilizado desde o s&eacute;culo XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos</p>','n'),
(3,5,'<p><strong>Lorem Ipsum</strong>&nbsp;&eacute; simplesmente uma simula&ccedil;&atilde;o de texto da ind&uacute;stria tipogr&aacute;fica e de impressos, e vem sendo utilizado desde o s&eacute;culo XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos</p>','n');


//TABELA PERGUNTAS

INSERT INTO perguntas (conteudos_id,perguntas_descricao,perguntas_del)
VALUES(3,'qual a pergunta 1?','n'),
(3,'qual a pergunta 2?','n'),
(3,'qual a pergunta 3?','n'),
(3,'qual a pergunta 4?','n'),
(3,'qual a pergunta 5?','n');

//TABELA RESPOSTAS

INSERT INTO respostas (perguntas_id,respostas_desc,respostas_correta,respostas_del)
VALUES
(1,'resposta 1','s','n'),
(1,'resposta 2','n','n'),
(1,'resposta 3','n','n'),
(1,'resposta 4','n','n'),
(1,'resposta 5','n','n'),
(2,'resposta 1','s','n'),
(2,'resposta 2','n','n'),
(2,'resposta 3','n','n'),
(2,'resposta 4','n','n'),
(2,'resposta 5','n','n'),
(3,'resposta 1','s','n'),
(3,'resposta 2','n','n'),
(3,'resposta 3','n','n'),
(3,'resposta 4','n','n'),
(3,'resposta 5','n','n'),
(4,'resposta 1','s','n'),
(4,'resposta 2','n','n'),
(4,'resposta 3','n','n'),
(4,'resposta 4','n','n'),
(4,'resposta 5','n','n'),
(5,'resposta 1','s','n'),
(5,'resposta 2','n','n'),
(5,'resposta 3','n','n'),
(5,'resposta 4','n','n'),
(5,'resposta 5','n','n');



//STRING DE BUSCA


SELECT perguntas.perguntas_descricao as perguntas, perguntas.perguntas_id as idperguntas, respostas.respostas_desc as respostas, respostas.respostas_correta as correta, respostas.respostas_id as idrespostas
FROM conteudos
INNER JOIN perguntas ON perguntas.conteudos_id = conteudos.conteudos_id
INNER JOIN respostas ON respostas.perguntas_id = perguntas.perguntas_id
WHERE conteudos.conteudos_id = 3 ORDER BY idperguntas