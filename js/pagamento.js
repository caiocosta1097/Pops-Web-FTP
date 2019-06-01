$(document).ready(function() { 
    var form = $("#frmPagamento");
    
    form.submit(function(event) {
        //session variables
        var name = sessionStorage.getItem("name");
       
        var logradouro = sessionStorage.getItem("logradouro");
        var cidade = sessionStorage.getItem("cidade");
        var cep = sessionStorage.getItem("cep");
        var num = sessionStorage.getItem("num");
        var itens = JSON.parse(sessionStorage.getItem("itemList"));
        var customer = JSON.parse(sessionStorage.getItem("customer"));
        var total = sessionStorage.getItem("total");

        //get form values
        var holder = $("#txtNome").val();
        var mes = $("#sltMes").val();
        var ano = $("#sltAno").val();
        var numCartao = $("#txtNumCartao").val();
        var codSeg = $("#txtCodSeguranca").val();
        var anoDigit = ano.substring(2, 4); //resgata os dois ultimos digitos do ano
        
        //get today date
        var delivery_date = new Date();
        var dd = delivery_date.getDate() ; //preciso arrumar essa parada
        var mm = delivery_date.getMonth()+1; 
        var yyyy = delivery_date.getFullYear();

        if(dd<10) {
            dd = '0'+dd
        } 

        if(mm<10) {
            mm = '0'+mm
        } 
        
        delivery_date = yyyy + '-' + mm + '-' + dd;
        
        event.preventDefault();
        var card = {} 
        card.card_holder_name = holder
        card.card_expiration_date =  mes  + anoDigit;
        card.card_number = numCartao;
        card.card_cvv = codSeg;

        console.log(delivery_date);
        console.log(customer.logradouro);

       
        
        
        // pega os erros de validação nos campos do form e a bandeira do cartão
        var cardValidations = pagarme.validate({card: card})
				
        //Então você pode verificar se algum campo não é válido
        if(!cardValidations.card.card_number)
          swal('Oops, número de cartão incorreto', {icon:"error"});
         
        //Mas caso esteja tudo certo, você pode seguir o fluxo
        pagarme.client.connect({ encryption_key: 'ek_test_IDW9bbVSmjmYmaMxAQaSoD023y84xm' })
          .then(client => client.security.encrypt(card))
          .then(card_hash => $("#hash").html((card_hash)))
    
        //Script para realizar a transação
          pagarme.client.connect({ api_key: 'ak_test_nlWrn8okbIUe8n7UfLUXvq4I0mcH0A' })
            .then(client => client.transactions.create({
                "amount": total,
                "card_number": card.card_number,
                "card_cvv":  card.card_cvv,
                "card_expiration_date": card.card_expiration_date,
                "card_holder_name": card.card_holder_name,
                "customer": {
                "external_id":(customer.id_p_fisica == undefined ? customer.cnpj : customer.id_p_fisica),
                "name": card.card_holder_name,
                "type": "individual",
                "country": "br",
                "email": customer.email,
                "phone_numbers": [
                    "+5511948612289",
                    
                ],
                "documents": [
                    {
                    "type": "cpf",
                    "number":  '46777025863'
                    }
                ],
                "birthday": (customer.data_nascimento != undefined ? customer.data_nascimento:'1999-12-12') 
                },
                "billing": {
                "name": name,
                "address": {
                    "country": "br",
                    "state": customer.uf,
                    "city": cidade,
                    "neighborhood": "null",
                    "street": logradouro,
                    "street_number":num,
                    "zipcode": cep
                }
                },
                "shipping": {
                "name": name,
                "fee": 1000,
                "delivery_date": delivery_date,
                "expedited": true,
                "address": {
                    "country": "br",
                    "state": "sp",
                    "city": cidade,
                    "neighborhood": "null",
                    "street": logradouro,
                    "street_number": num,
                    "zipcode": cep
            }
            },
            "items": itens
        }))
        .then(transaction => {
            if(transaction.refuse_reason == null){
                swal("Parabéns, você acaba de adquirir uma compra da Pop´s", {
                    icon:"success",
                    className: "swal2-popup"})
                .then((value) => {window.location.href = "index.php"});


                 //conexão com banco de dados da pops
                $.ajax({
                    type: "POST",
                    url: `http://${host}/backend/services/CompraService.php/?op=buy`,
                    //dataType:"json", -> POR ENQUANTOOOOOOO
                    data:{
                    
                    'nome':name,
                    'valor_total':total,
                    'peso_total':10,
                    'volume_total':10,
                    'status':1,
                    'status_pedido':'Pagamento Confirmado',
                    'logradouro':customer.logradouro,
                    'bairro':customer.bairro,
                    'cidade':cidade,
                    'uf':customer.uf,
                    'dt_compra': '2019-06-01'
                    },
                    success: function(data){
                        console.log(data);
                    },
                    error: function(){
                        alert('deu erro');
                    }
                });    
               
            } else {
                swal("Essa não! Sua compra não poder ser efetuada. Por favor, verifique os dados inseridos", {icon:"error"});
            }
            console.log(transaction)
        })
       
           
         })
    });

$("#form_compra").submit(function(evt){
    evt.preventDefault();
    sessionStorage.setItem("name", $("#destinatario").val());
    sessionStorage.setItem("logradouro", $("#logradouro").val());
    sessionStorage.setItem("cidade", $("#cidade").val());
    sessionStorage.setItem("cep", $("#cep").val());
    sessionStorage.setItem("num", $("#num").val());
    window.location.href = "pagamento.php";
});