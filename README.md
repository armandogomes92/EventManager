# EventManager

Este repositório foi criado para fins de avaliação e de um teste prático.

#Requisitos

Visão geral-Criar um sistema de crud utilizando Bootstrap e o framework PHP Symfony (não utilizaro make:crud). -Disponibilizar uma api rest para consumir os dados. Serão avaliados:​ Design e clareza nos códigos, organização do repositório e lógica utilizadapara consumir e persistir os dados;

#Regra de Negócio

A aplicação será para um sistema de eventos, onde o principal serviço é criar “eventos” eorganizar as palestras que acontecerão nele. O sistema terá duas funções principais: ​Gerenciaros eventos (crud) ​Gerenciar as palestras do evento(crud). Deverá existir um relacionamento entre as palestras e o evento ao qual ela vai estar. A api deverá disponibilizar os dados dos eventos e das palestras de cada evento, além deaceitar criação, edição e exclusão dos mesmos.Sinta-se livre para utilizar as tecnologias/bibliotecas que achar melhor, mas lembre-se de separar a aplicação em camadas e definir bem as responsabilidades de cada classe. É trivial autilização de Orientação a Objetos, e de preferência o PHP 7.2 ou mais.

#Todo evento tem:

###● Titulo 

###● Data e hora de Inicio 

###● Data e hora de Fim 

###● Descrição #Toda palestra tem: 

###● Titulo 

###● Data 

###● Evento (relacionamento) 

###● hora de Inicio 

###● hora de Fim 

###● Descrição 

###● Palestrante (pode ser apenas texto, mas se fizer outro crud aumenta a pontuação) Obs: Não é obrigatório o uso de autenticação, mas se quiser pode, e valerá pontos a mais


##Foram utilizado os seguintes componentes:

###● Annotations 

###● ORM Doctrine 

###● Security 

###● Firebase/php-jwt 

###● Orm-fixtures 

###● Maker-bundle(Somente para a parte de autenticação que no momento da criação ainda não sabia implementar na "unha")

API's contruidas com OO utilizando uma classe abstrata para realizar o CRUD, interfaces, repositories e factorys para que cada resposabilidade ficasse bem separada. Após a implementação feita, inseri paginação dos dados, informações de respostas e a autenticação.

As entidades das API's são: 
###● Evento 

###● Escopo 

  { 

    "titulo": "", 
    "dataInicial": "", 
    "horaInicial": "", 
    "dataFinal": "", 
    "horaFinal": "", 
    "descricao": "" 
   }

● Palestra 

● Escopo 

  {

    "titulo": "", 
    "data": "", 
    "eventoId": 0, => Realcionamento com entidade evento 
    "horaInicial": "", 
    "horaFinal": "",
    "descricao": "",
    "palestranteId": 0 => Relacionamento com entidade palestrante 
   
}

● Palestrante 

● Escopo 

  { 

    "nome": "" 

  }

Obs: Defini o username como 'alessandro' (avaliador). Caso queira alterar para persistir no DB, em 'src\DataFixtures\UserFixtures'
