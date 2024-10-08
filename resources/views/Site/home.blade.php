@extends("Site.template")
@section("conteudo")
@include("Site.cabecalho")

<div class="base-banner-top">
	<div class="rows">
		<div class="col-6">
			<h1>Sistema de gestão de empresas</h1>
			<h5 class="mb-3">Gerencie seu negócio e empresa com nosso sistema de gestão completo e fácil de usar!</h5>
		<div class="d-flex but">
			<a href="{{route('planos')}}" class="btn btn-verde">Quero testar grátis</a>
			<a href="https://api.whatsapp.com/send?phone=5561984801857" target="_blank" class="btn btn-outline-verde">Conversar com um operador</a>
		</div>
		</div>
	</div>
	<i class="fas fa-angle-down ico-centro"></i>
</div>

<div class="dobra_um">
	<div class="conteudo">
		<div class="rows">
			<div class="col-12 text-center">
				<span class="h2 mb-1 text-azul fw-700">Gerencie sua empresa</span>
				<span class="h5 text-escuro mb-5">Com o sistema ABCeSolution você vai poder gerenciar as seguintes funções</span>
			</div>
			<div class="col-4 mb-3 d-flex">
				<div class="caixa">
					<i class="icos ico-venda"></i>
					<span class="d-block h4 text-azul text-center text-uppercase">Vendas</span>
					<p>Gerencie suas vendas, comissionamentos e envio de orçamentos</p>
				</div>
			</div>
			
			<div class="col-4 mb-3 d-flex">
				<div class="caixa">
					<i class="icos ico-cadastro"></i>
					<span class="d-block h4 text-azul text-center text-uppercase">Cadastro</span>
					<p>Cadastre usuários, clientes, fornecedores e vendedores e organize seu empreendimento</p>
				</div>
			</div>
			
			<div class="col-4 mb-3 d-flex">
				<div class="caixa">
					<i class="icos ico-estoque"></i>
					<span class="d-block h4 text-azul text-center text-uppercase">Estoque</span>
					<p>Cadastre, controle e organize as informações e os produtos do seu estoque</p>
				</div>
			</div>
			
			<div class="col-4 mb-3 d-flex">
				<div class="caixa">
					<i class="icos ico-nota"></i>
					<span class="d-block h4 text-azul text-center text-uppercase">Nota fiscal</span>
					<p>Emita notas fiscais com praticidade! Emita NF-e NFS-e NFC-e</p>
				</div>
			</div>
			
			<div class="col-4 mb-3 d-flex">
				<div class="caixa">
					<i class="icos ico-financeiro"></i>
					<span class="d-block h4 text-azul text-center text-uppercase">Financeiro</span>
					<p>Controle e organize suas contas, facilitando a gestão financeira do seu negócio. Controle suas contas a pagar, contas a receber, faturamento dos pedidos, emissão de NF-e, fluxo de caixa.</p>
				</div>
			</div>
			
			<div class="col-4 mb-3 d-flex">
				<div class="caixa">
					<i class="icos ico-loja"></i>
					<span class="d-block h4 text-azul text-center text-uppercase">Loja virtual</span>
					<p>Tudo o que você precisa para vender na internet: gerencie e escala a sua loja virtual.</p>
				</div>
			</div>
			
		</div>
	</div>
</div>

<div class="dobra_dois base-banner">
	<div class="conteudo">
		<div class="rows rows2 text-center mt-2">		
			<div class="col-12 text-center pb-3">
				<span class="d-block text-center h3 text-branco mt-1">Escolha um <span class="text-amarelo">plano ideal</span> para sua empresa</span>
				<div class="rows text-center mt-2">
					@foreach($planos as $plano)
						@php
							$usuario = ($plano->plano->limite_usuario==1) ? "01 Usuário" : $plano->plano->limite_usuario . " Usuários" ;
							$nfe    = ($plano->plano->limite_nfe > 0) ? $plano->plano->limite_nfe ." NF-e" :  "NF-e Não permitida" ;
							$nfce    = ($plano->plano->limite_nfce > 0) ? $plano->plano->limite_nfce ." NFC-e" :  "NFC-e Não permitida" ;
							$pdv    = ($plano->plano->limite_pdv > 0) ? $plano->plano->limite_pdv ." PDV" :  "PDV Não permitido" ;
							$total   = $plano->plano->preco + $plano->plano->valor_setup;
						@endphp
						<div class="col d-flex mb-3">
							<div class="caixa plano1">
								<strong class="h5 d-block mb-1 text-uppercase">{{$plano->plano->nome}}</strong>

								<p class="h5 mb-1 text-vermelho">
									<strike>De {{$plano->preco_de}}</strike>
								</p>
								<p class="h5">
									<span class="text-escuro">Por apenas</span>
									<strong class="d-block  h4">R$ {{$plano->preco}}</strong>
								</p>
								<ul>
									<h3>Recursos</h3>
									<li><i class="fas fa-check"></i> {{$usuario}} </li>
									<li>
										<i class="fas fa-check"></i> {{ ($plano->limite_nfe == -1) ? " NF-e Ilimitado " : $nfe }}
									</li>
									<li>
										<i class="fas fa-check"></i> {{ ($plano->limite_nfce == -1) ? " NFC-e Ilimitado " : $nfce }}
									</li>
									<li>
										<i class="fas fa-check"></i> {{ ($plano->limite_pdv == -1) ? " NFC-e Ilimitado " : $pdv }}
									</li>

									<li>
										<hr class="mb-2">
									</li>

									<h3>Módulos</h3>
									@foreach($plano->plano->modulos as $modulo)
										<li><i class="fas fa-check"></i> {{ $modulo->nome }} </li>
									@endforeach
								</ul>
								<a href="{{route('cadastro', $plano->id)}}" class="btn btn-verde d-table m-auto scroll-page" style="position:absolute; bottom: 15px;"><i class="fas fa-arrow-right"></i> Quero testar</a>
							</div>
						</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>

@include('Site.rodape')
@endsection