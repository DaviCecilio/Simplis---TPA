<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>Simplis - Simplificando Eventos</title>

    <meta name="author" content="Davi M. Cecílio">
    <meta name="copyright" content="© 2019 DaviCecilio" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/productDetails.css">
    <link rel="stylesheet" type="text/css" href="../css/shop.css">


    <link rel="shortcut icon" href="../assets/img/simplesLogo.png" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/a527eeac58.js"></script>
  

     <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>


    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {

                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>



</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-light borderbottom">
        <div class="container menu">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">

            </div>

            <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="index.php">
                    <div class="imgresponsive logoNav">
                        <img class="img-fluid" alt="Simples - Logo" src="../assets/img/simplesLogo.png">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">

            </div>

        </div>
    </nav>

        <div class="container-fluid">

            <form id="regForm" action="comprado.php">
                <h1 class="text-center">Registre-se</h1>
                <p class="text-muted text-center">Para efetuar a compra</p>

                    <div class="tab">
                        Nome:
                        <p><input placeholder="Ex.: Gabriel" id="nome" required></p>
                        Sobrenome:
                        <p><input placeholder="Ex.: Eduardo Costas" id="sobrenome" required></p>
                        Data de Nascimento:
                        <p><input  type="date" id="dataNasc" required></p>
                        CPF:
                        <p><input id="cpf" placeholder="XXX.XXX.XXX-XX" type="number" required></p>
                    </div>

                    <div class="tab">
                        CEP:
                        <p><input placeholder="Informe seu CEP" value="" size="10" maxlength="9" type="number"  id="cep" required></p>
                        
                        Rua:
                        <p><input placeholder="Informe sua Rua" type="text" id="rua" required></p>

                        Nº:
                        <p><input placeholder="Informe seu Numero" type="number" id="numero" required></p>
                        
                        Bairro:
                        <p><input placeholder="Informe seu Bairro" type="text" id="bairro" required></p>

                        Cidade:
                        <p><input placeholder="Informe sua Cidade" type="text" id="cidade" required></p>

                        Estado:
                        <p><input placeholder="Informe seu Estado" size="2" type="text" id="uf" required></p>

                   
                    </div>

                    <div class="tab">
                    Telefone:
                        <p><input placeholder="(XX) XXXX-XXXX" type="number" id="telefone" name="telefone" required></p>
                    
                    Celular:
                        <p><input placeholder="(XX) XXXXX-XXXX"type="number" id="celular" name="celular" required></p>
                    
                    Email:
                        <p><input placeholder="exemplo@exemplo.com.br"  type="email" id="email" required></p>
                    </div>

                    <div class="tab">

                        <div class="form-group">
			                <div class="col-md-12">
                                Bandeira:
								<select id="tipoCartao" name="tipoCartao" class="form-control">
										<option value="1">Visa</option>
										<option value="2">MasterCard</option>
										<option value="3">American Express</option>
										<option value="4">Elo</option>
								</select>
							</div>
                        </div>
                        
                        <div class="form-group">
							<div class="col-md-12"><label class="form-label">Numero do cartão:</label></div>
							<div class="col-md-12"><input type="text" class="form-control" required="required" name="car_number" value="" /></div>
                        </div>
                        
						<div class="form-group">
							<div class="col-md-12"><label class="form-label">Código CVV:</label></div>
							<div class="col-md-12"><input type="text" class="form-control" required="required"  name="car_code" value="" /></div>
                        </div>
                        
						<div class="form-group">
							<div class="col-md-12">

                                <label class="form-label">Data de Expiração:</label>
                                
                            </div>
                                                            
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <select class="form-control">
                                                                        <option value="">Mês</option>
                                                                        <option value="01">01</option>
                                                                        <option value="02">02</option>
                                                                        <option value="03">03</option>
                                                                        <option value="04">04</option>
                                                                        <option value="05">05</option>
                                                                        <option value="06">06</option>
                                                                        <option value="07">07</option>
                                                                        <option value="08">08</option>
                                                                        <option value="09">09</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                    </select>
                                    </div>
                                                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <select class="form-control">
                                                                        <option value="">Ano</option>
                                                                        <option value="2015">2015</option>
                                                                        <option value="2016">2016</option>
                                                                        <option value="2017">2017</option>
                                                                        <option value="2018">2018</option>
                                                                        <option value="2019">2019</option>
                                                                        <option value="2020">2020</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2024">2024</option>
                                                                        <option value="2025">2025</option>
                                                                    </select>
                                    </div>

                                </div>

                            </div>
												
					    </div>

                    <div style="overflow:auto;">
                        <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
        </form>
					
					
        </div>	

    <!-- Footer -->
    <footer id="secao5" class="rodape bordertop">

        <div class="container">

            <div class="row text-center text-xs-center text-sm-left text-md-left">

                <div class="col-xs-12 col-sm-8 col-md-8">

                    <h5 class="text-uppercase font-weight-bold">Simplis Eventos</h5>
                    <p>O Simplis Eventos, empresa mineira situada na cidade de Belo Horizonte - MG, fundada em 2019, tem
                        como objetivo principal simplificar a conecção de pessoas a experiências únicas,
                        desde o momento de descoberta à realização do evento .</p>

                </div>


            </div>

            <br><br>
            <br><br>

            <div class="row">

                <div class="col-xs-12 col-12 col-md-12 mt-2 mt-sm-2 text-center text-white">

                    <p class="h6">&copy Simplis Eventos.<a class="text-green ml-2"
                            href="https://www.linkedin.com/in/davi-cec%C3%ADlio-b29ba618b" target="_blank">Produzido por
                            Davi Martins Cecílio</a></p>

                </div>

            </div>
            <br><br>
        </div>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


        <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
        }

        function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        }

        function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
        }

        function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
        }
        </script>

</body>

</html>