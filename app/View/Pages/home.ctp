<script type="text/javascript">

    $(document).ready(function () {

        $("#birthdate").mask("99/99/9999");
        $("#cpf").mask("999.999.999-99");

        //:::Popula o select com as especialidades:::
        var settings = {
            "url": "https://api.feegow.com.br/api/specialties/list",
            "method": "GET",
            "timeout": 0,
            "headers": {
                "x-access-token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38"
            }
        };
        $.ajax(settings).done(function (response) {
            var selectbox = $('#specialty_id');
            $('<option>').val('').text('Selecione').appendTo(selectbox);
            $.each(response.content, function (index, value) {
                $('<option>').val(value.especialidade_id).text(value.nome).appendTo(selectbox);
            });
        });


        var settings2 = {
            "url": "https://api.feegow.com.br/api/patient/list-sources",
            "method": "GET",
            "timeout": 0,
            "headers": {
                "x-access-token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38"
            }
        };
        $.ajax(settings2).done(function (response) {
            var selectbox2 = $('#source_id');
            $('<option>').val('').text('Selecione').appendTo(selectbox2);
            $.each(response.content, function (index, value) {
                $('<option>').val(value.origem_id).text(value.nome_origem).appendTo(selectbox2);
            });
        });


        $(document).on('click', '#mostrar', function () {
            $('#results').html('');
            $('#titulo').html('');
            var esp = $('#specialty_id').val();
            var esp_txt = $('#specialty_id :selected').text();
            var content_profissionais = $('#results');
            var settings = {
                "url": "https://api.feegow.com.br/api/professional/list?ativo=1&unidade_id=1&especialidade_id=" + esp,
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "x-access-token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38"
                }
            };
            $.ajax(settings).done(function (response) {
                if (response.content != '') {
                    $('<div class="col-12">').html('<h3>' + esp_txt + ' encontrado</h3>').appendTo('#titulo');
                    $.each(response.content, function (index, value) {
                        $('<div class="col-lg-1 col-sm-4 bg-light pt-3 rounded">').html('<img src="/feegow/img/sem-imagem.png" height="auto" width="40">').appendTo(content_profissionais);
                        $('<div class="col-lg-3 col-sm-8 bg-light pt-3 rounded">').html(value.tratamento + ' ' + value.nome + '<p>' + value.conselho + ' ' + value.documento_conselho + '</p><p><button type="button" class="btn btn-success" onclick="Agendar(' + value.profissional_id + ');" id="' + value.profissional_id + '" nome="' + value.nome + '" >Agendar</button></p>').appendTo(content_profissionais);
                    });
                } else {
                    $('<div class="col-12">').html('<h3>Nenhum profissional encontrado!</h3>').appendTo('#titulo');
                }
            });
        });

    });

    function Agendar(professional_id) {
        var nome_prof = $('#' + professional_id).attr('nome');
        $('#formulario').show();
        $('#professional_id').val('');
        $('#professional_id').val(professional_id);
        $('#selecionado').html(nome_prof);
    }

    function Gravar() {

        var specialty_id = $('#specialty_id :selected').val();
        var professional_id = $('#professional_id').val();
        var name = $('#name').val();
        var cpf = $('#cpf').val();
        var source_id = $('#source_id :selected').val();
        var birthdate = $('#birthdate').val();

        $.ajax({
            type: 'GET',
            url: "/feegow/Pages/gravaForm",
            data: {specialty_id: specialty_id, professional_id: professional_id, name: name, cpf: cpf, birthdate: birthdate, source_id: source_id},
            success: function (data) {
                $('#msg').html(data);
            },
            beforeSend: function () {
                $("#msg").html('<img src="/feegow/img/loading.gif">');
            },
            complete: function () {
                $('#msg').html('<div class="alert alert-success alert-dismissible fade show" role="alert">Agendamento gravado com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $('#specialty_id').val('');
                $('#professional_id').val('');
                $('#name').val('');
                $('#cpf').val('');
                $('#source_id').val('');
                $('#birthdate').val('');
            }

        });

    }

</script>

<div class="card">
    <div class="card-header">Consulta por especialidades</div>

    <div class="card-body">
        <div class="input-group">
            <select name="specialty_id" class="custom-select" id="specialty_id"></select>
            <div class="input-group-append">
                <button class="btn btn-success" type="button" id="mostrar">Buscar</button>                
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mb-4" id="titulo"></div>
        <div class="row ml-1 mr-1" id="results"></div>
    </div>

    <div class="card-body" id="formulario" style="display: none;">        
        <div class="col-sm-12 col-lg-12"><h5>Preencha seus dados para agendar com <span id="selecionado"></span> </h5></div>
        <div class="col-sm-12 col-lg-10">

            <input name="professional_id" id="professional_id" type="hidden">                
            <div class="form-row">
                <div class="form-group col-md-6">                                                
                    <input name="name" id="name" class="form-control" autocomplete="off" placeholder="Nome completo">
                </div>
                <div class="form-group col-md-6">
                    <select name="source_id" id="source_id" class="form-control"></select>
                </div>
                <div class="form-group col-md-6">
                    <input name="birthdate" id="birthdate" class="form-control" autocomplete="off" placeholder="Nascimento">
                </div>
                <div class="form-group col-md-6">
                    <input name="cpf" id="cpf" class="form-control" autocomplete="off" placeholder="CPF">
                </div>
            </div>
            <button class="btn btn-success" onclick="Gravar();">Gravar</button>

        </div>
        <div class="row mt-3">
            <div class="col-md-12" id="msg"></div>
        </div>
    </div>

</div>


