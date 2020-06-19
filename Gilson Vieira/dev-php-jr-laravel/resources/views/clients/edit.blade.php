{{--
NOTA DE ESCLARECIMENTO.

Na maioria das implementações, quando possível, costumo utilizar o mesmo arquivo com o formulario para requisições de criação e alteração de dados, Porém,
para fins de legibilidade e padrões RESTFull neste projeto duplicarei o formulário em dois.

create.blade.php -> para criação de novos registros
edit.blade.php -> para edição de registros existentes

--}}
@extends('layout.index')
@section('stylesheet')
@endsection

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Clientes</a></li>
                        <li class="breadcrumb-item active">Editar {{$client->client_name}}</li>
                    </ol>
                </div>
                <h4 class="page-title">Editar cliente <span class="font-weight-bold">{{$client->client_name}}</span></h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <form class="row justify-content-center mb-5" method="POST" accept-charset="UTF-8" action="{{route('cliente.update', $client->client_id)}}">
        @method('PATCH')  @csrf
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Dados do cliente</h4>
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select2 form-control" name="client_status">
                                    <option readonly disabled>Selecione</option>
                                    <option value="INATIVO" {{($client->client_status == 'INATIVO') ? 'selected' : ''}}>Inativo</option>
                                    <option value="ATIVO" {{($client->client_status == 'ATIVO') ? 'selected' : ''}}>Ativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-md-3"></div>
                        <div class="w-100"></div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="client_name">Nome</label>
                                <input type="text" class="form-control" id="client_name" name="client_name"  placeholder="" value="{{$client->client_name}}">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="client_cpf">CPF</label>
                                <input type="text" class="form-control cpf-mask" maxlength="14" id="client_cpf" name="client_cpf"  placeholder="" value="{{$client->client_cpf}}">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="client_rg">RG</label>
                                <input type="text" class="form-control rg-mask" maxlength="11" id="client_rg" name="client_rg"  placeholder="" value="{{$client->client_rg}}">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="client_birth_date">Data de nascimento</label>
                                <input type="text" class="form-control nasc-mask" maxlength="10" id="client_birth_date" name="client_birth_date"  maxlength="10" placeholder="" value="{{$client->client_birth_date}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Contatos</h4>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="client_phone">Celular</label>
                                <input type="text" class="form-control phone-mask" maxlength="15" id="client_phone" name="client_phone"  placeholder="" value="{{$client->client_phone}}">
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="client_email">E-mail</label>
                                <input type="email" class="form-control" id="client_email" name="client_email"  placeholder="" value="{{$client->client_email}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Endereço</h4>
                    <div class="row">
                        <div class="col-6 col-md-2">
                            <div class="form-group">
                                <label for="client_cep">Cep</label>
                                <input type="text" class="form-control cep-mask" maxlength="10" id="client_cep" name="client_cep"  placeholder="" value="{{$client->client_cep}}">
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <label for="client_address">Endereço</label>
                                <input type="text" class="form-control" id="client_address" name="client_address"  placeholder="" value="{{$client->client_address}}">
                            </div>
                        </div>
                        <div class="col-6 col-md-2">
                            <div class="form-group">
                                <label for="client_number">Número</label>
                                <input type="text" class="form-control" id="client_number" name="client_number"  placeholder="" value="{{$client->client_number}}">
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="client_complement">Complemento</label>
                                <input type="text" class="form-control" id="client_complement" name="client_complement"  placeholder="" value="{{$client->client_complement}}">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="client_neighborhood">Bairro</label>
                                <input type="text" class="form-control" id="client_neighborhood" name="client_neighborhood" placeholder="" value="{{$client->client_neighborhood}}">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="client_city">Cidade</label>
                                <input type="text" class="form-control" id="client_city" name="client_city"  placeholder="" value="{{$client->client_city}}">
                            </div>
                        </div>
                        <div class="col-6 col-md-2">
                            <div class="form-group">
                                <label for="client_uf">UF</label>
                                <input type="text" class="form-control" maxlength="2" id="client_uf" name="client_uf"  placeholder="" value="{{$client->client_uf}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light float-right mb-5">Gravar</button>
        </div>
    </form>
@endsection

@section('scriptsheet')

    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="{{asset('assets/js/viacep.js')}}"></script>
    <script src="{{asset('assets/js/validade.js')}}"></script>
    <script defer>
        $(function () {
            // $('.select2').select2();

            $('.cpf-mask').mask('###.###.###-##');
            $('.rg-mask').mask('##.###.###-#');
            $('.nasc-mask').mask('##/##/####');
            $('.phone-mask').mask('(##) #####-####');
            $('.cep-mask').mask('##.###-###');
        });
    </script>
@endsection
