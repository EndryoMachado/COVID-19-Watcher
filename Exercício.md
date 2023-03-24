Exercício para o processo seletivo da Kidopi

Descrição: O exercício consistirá na construção de um sistema (interface web) que possibilite ao usuário obter informações sobre os casos de mortes por Covid. Estes dados serão obtidos por meio da API-Covid-19 que está disponível no servidor da Kidopi. É possível obter dados do número de casos confirmados e mortes de vários países afetados pela COVID-19.

IMPORTANTE: Use PHP para fazer o backend!

1ª parte:

Você deve criar uma página que permita escolher entre três países (Brazil, Canada ou Australia) e se comunique com a API-Covid-19. Ela também deverá mostrar o número total de casos confirmados e mortes do país selecionado. Ao selecionar um país, a página deve exibir os dados de cada estado também (os dados podem ser exibidos da maneira que você preferir).

2ª parte:

Você também deve armazenar em um banco de dados (MySQL) a data e hora de todos os acessos que seu script fez à API-Covid-19, bem como qual o país escolhido para a consulta.

3ª parte:

Sua página deve ser criada utilizando HTML, CSS e JS. Mostre no rodapé da página, a data e o país procurado do último acesso à API-Covid-19.

Parte Bônus:
Essa parte não é obrigatória, você faz se quiser.

Faça uma interface web local (ou reaproveite a já criada das partes anteriores) em que o usuário possa escolher dois países diferentes (não precisa escolher estado), os países disponíveis para escolha devem ser todos os listados pela 'API-Países-Disponíveis'. Pegue os dados de covid desses países escolhidos e mostre na interface a diferença da taxa de morte entre esses países selecionados (taxa de morte do país todo). Para esse cálculo da diferença utilize de subtração simples (TaxaPais1 - TaxaPais2).
A taxa de morte pode ser calculada pela fórmula: Taxa de morte = Mortes / Confirmados.

API-Covid-19:
Método: GET

URL(API-Covid-19):
https://dev.kidopilabs.com.br/exercicio/covid.php?pais=Brazil

Retorno:
{"0":{"ProvinciaEstado":"Acre","Pais":"Brazil","Confirmados":149378,"Mortos":2027},"1":{"ProvinciaEstado":"Alagoas","Pais":"Brazil","Confirmados":320552,"Mortos":7118}


API-Países-Disponíveis:
Método: GET

URL:
https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1

Retorno:
{"0":"Afghanistan","1":"Albania","2":"Algeria","3":"Andorra","4":"Angola","5":"Antarctica"...}


Observações:
1 - Os nomes dos países estão em inglês.
2 - Alguns países retornam só o valor total de casos confirmados e de mortes no país inteiro, sem os dados por estado.
3 - A API-Covid-19 retorna os dados de todos os estados do país, você pode mudar o nome do país no final do link para o nome do país que deseja pegar os dados.
4 - A API-Países-Disponíveis retorna o nome de todos os países disponíveis para obter os dados.
Suba o seu projeto no GitHub, informe o link do projeto no campo Link Do GitHub. Caso tenha duvidas de como fazer o procedimento, ao final do formulário existem links de vídeos que vão te ajudar. Faça um arquivo “readme” no github explicando como inicializar e configurar seu projeto.