1. Este plugin foi desenvolvido sob-medida para um cliente. 
Nesta documentação, serão abordados os pré-requisitos para sua utilização, 
como plugins extras e conexões com APIs privadas.

---------------

2. Para o bom funcionamento do plugin, é necessário ter o WooCommerce 
instalado e configurado. Deve-se também preencher todos campos de 
informações disponíveis para os usuários (telefones, e-mails, cep e etc) - manter essas 
informações preenchidas é FUNDAMENTAL. Além disso, é interessante instruir o 
administrador a preencher os campos de SKU de acordo com o código de barras do produto. Os pedidos
devem ser feitos de maneira que cumpram todas as informações (por ex. nome do cliente, cpf, etc)

---------------

3. O plugin *** Brazilian Market on WooCommerce  
(https://br.wordpress.org/plugins/woocommerce-extra-checkout-fields-for-brazil/) foi instalado 
para que tivéssemos o controle dos CPF/CNPJ em nossa loja virtual, possibilitando levar esses 
dados também para o formulário do arquivo tx2.

---------------

4. Em configurações > NF-e PLUG, definir as informações 
padrões que serão enviadas para o formulário de emissão
da nota fiscal, como o CEST, CNPJ do administrador, etc.

Essas informações são de extrema importância para as requisições da API
e também para facilitar a experiência do usuário ao preencher os campos nos formulários da NF-e.

---------------

5. Em casos de servidores Línux, não se esqueça de liberar as permissões de gravação (777) em 
'wp-content/plugins/nf-plug/includes/form/tx2', para que os arquivos tx2 possam ficar salvos normalmente
no momento da geração dos mesmos.

--------------

6. A respeito do auto-preenchimento de cnpj/cpf no formulário de emissão da NF-e (...)

-------------

7. Este componente utiliza os códigos SKU do produto como códigos de barras, então sempre preencha com 
códigos válidos, sem pontuações (apenas números).

------------