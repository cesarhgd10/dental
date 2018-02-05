<?php

global $post;

$args = array(
  'post_type' => 'product',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => '_regular_price',
  'order' => 'ASC',
  'tax_query' => array(
      array(
          'taxonomy' => 'product_cat',
          'field' => 'slug',
          'terms' => 'aparelho'
      )
    )
  );

$aparelhos = new WP_Query( $args );
?>

  <div id="wa-container-wrapper-jcjcotj45br2cg" >
		<div id="wa-container-jcjcotj45br2cg" class="container  " >
			<div id="wa-row-jbzojt567zwl3c" class="row  ">
				<div class="col-xl-12 wa-item-rowspacer"></div>
			</div>
			<div class="wa-container-vspacer col-xl-12"></div>
			<div id="wa-row-jbzoiawiarnqzs" class="row row-align  ">
				<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
					<div id="wa-comptext-jbzoizca7pkmjc" class="wa-comptext clearfix">
						<p style="text-align: center;"><span style="color: #ffffff;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 40px;">Essenciais para qualquer sorriso. </span></strong></span></p>
						<p style="text-align: center;"><span style="color: #ffffff;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 40px;">Perfeitos para todos os bolsos.</span></strong></span></p>
					</div>
				</div>
			</div>
			<div class="wa-container-vspacer col-xl-12"></div>
			<div id="wa-row-jbzojx8x7zwlhk" class="row  ">
				<div class="col-xl-12 wa-item-rowspacer"></div>
			</div>
		</div>
	</div>
	<div id="wa-container-wrapper-jcjcotj55bqtuw" >
		<!-- <div id="wa-container-jcjcotj55bqtuw" class="container  " >
			<div id="wa-row-jbzom9jt7jubb4" class="row  ">
				<div class="col-xl-12 wa-item-rowspacer"></div>
			</div>
			<div class="wa-container-vspacer col-xl-12"></div>
			<div id="wa-row-jbzok1f5arjpyg" class="row row-align  ">
				<div class="hidden-xs col-xs-12 col-sm-1 col-md-1 col-lg-1 " >
				</div>
				<div class=" col-xs-12 col-sm-11 col-md-11 col-lg-11 " >
					<div id="wa-comptext-jbzokqyp7wfvq0" class="wa-comptext clearfix">
						<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: large;"><?php //$post->post_content; ?></span></p>
				</div>
			</div>
			<div class="wa-container-vspacer col-xl-12"></div>
			<div id="wa-row-jbzombnc7judz4" class="row  ">
				<div class="col-xl-12 wa-item-rowspacer"></div>
			</div>
		</div>
	</div> -->

  <div id="wa-container-wrapper-jcjcotj55bqtuw">
		<div id="wa-container-jcjcotj55bqtuw" class="container  ">
			<div id="wa-row-jbzom9jt7jubb4" class="row  ">
				<div class="col-xl-12 wa-item-rowspacer"></div>
			</div>
			<div class="wa-container-vspacer col-xl-12"></div>
			<div id="wa-row-jbzok1f5arjpyg" class="row row-align  ">
				<div class="hidden-xs col-xs-12 col-sm-1 col-md-1 col-lg-1 " style="top: 0px; opacity: 1;">
				</div>
				<div class=" col-xs-12 col-sm-11 col-md-11 col-lg-11 " style="top: 0px; opacity: 1;">
					<div id="wa-comptext-jbzokqyp7wfvq0" class="wa-comptext clearfix">
						<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: large;">Um sorriso bonito e uma mordida correta beneficia diversos fatores, como o sono e a respiração. Você também passa a mastigar e a falar adequadamente, além de claro, aumentar a autoestima e o bem estar.</span></p>
						<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: large;">&nbsp;</span></p>
						<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: large;">Através do uso de aparelhos ortodônticos, o Plano Ortodontia oferece assistência completa, instalação e manutenção do aparelho, corrigindo sua dentição proporcioando um sorriso saudável.</span></p>
						<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: large;">&nbsp;</span></p>
						<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: large;">O período médio de tratamento dura entre 24 a 36 meses, podendo variar para mais ou para menos conforme o tratamento, a complexidade e o comprometimento do paciente.</span></p>
					</div>
				</div>
			</div>
			<div class="wa-container-vspacer col-xl-12"></div>
			<div id="wa-row-jbzombnc7judz4" class="row  ">
				<div class="col-xl-12 wa-item-rowspacer"></div>
			</div>
		</div>
	</div>

	<div id="wa-container-wrapper-jcjcotj65bqqrs" >
		<div id="wa-container-jcjcotj65bqqrs" class="container  " >
			<div id="wa-row-jbzoln0carmxt4" class="row row-align  ">

        <?php foreach( $aparelhos->posts as $aparelho ): ?>

				<div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
					<div id="wa-sub-container-jcjcotj65bqxps">
						<div id="wa-row-jbzolo7aarmueg" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jbzom3y57pl1i0" class="wa-comptext clearfix">
									<p><img style="margin: 10px auto; display: block; max-width: 171px; max-height: 206px;" src="<?= ProductHelper::get_product_photo( $aparelho->ID ) ?>" alt="" title="" /></p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzoofqs9r4sao" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="<?= get_field( 'beneficio_label_class', $aparelho->ID ) ?>" class="wa-comptext clearfix">
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff; font-size: 18px;">BE Ortodontia</span></p>
									<p style="text-align: center;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff; font-size: 18px;"> <?= $aparelho->post_title ?></span></strong></p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzorywu5n3wco" class="row  ">
							<div class="col-xl-12 wa-item-rowspacer"></div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzopho35phvq8" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jbzopisr7wfgrc" class="wa-comptext clearfix">
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Por apenas</span></p>
									<p style="text-align: center;"><span style="font-size: 30px;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">R$ <span style="font-size: 50px;"><?= ProductHelper::get_price( $aparelho->ID ) ?></span>,00 mensais</span></strong></span></p>
									<p style="text-align: center; padding-left: 240px;"><span style="font-size: 8px;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">* No cartão de crédito</span></span></p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzoufk25m5ubc" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jbzouk5n9u3908" class="wa-comptext clearfix">
									<p style="text-align: center;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 16px;">Você terá acesso a:</span></strong></p>
                  <?php
                    $beneficios = get_field( 'beneficios', $aparelho->ID );

                    foreach( $beneficios as $beneficio ):
                  ?>
                  <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;"><?= $beneficio['nome_do_beneficio'] ?></span></p>
                  <?php endforeach; ?>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">- Clareamento Dental </span><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 10px;">*caseiro</span></p>
									<p style="text-align: center;"> </p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzowddm7tab40" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-compbutton-padwrapper-jbzox5pa7pdfx4" class="wa-compbutton-padwrapper">
									<div id="wa-compbutton-jbzox5pa7pdfx4-halign">	<a id="<?= get_field( 'beneficio_button_class', $aparelho->ID ) ?>" href="page7.html"  class="btn btn-primary wa-compbutton"  >ADQUIRA AGORA</a>
									</div></div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jcf4pnxl5784cw" class="row  ">
							<div class="col-xl-12 wa-item-rowspacer"></div>
						</div>
					</div>
				</div>
        <div class="clearfix visible-xs "></div>
      <?php endforeach; ?>

				<!-- <div class="clearfix visible-xs "></div>
				<div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
					<div id="wa-sub-container-jcjcotjb5br014">
						<div id="wa-row-jbzoloc1armwbs" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jbzomzs27wf31k" class="wa-comptext clearfix">
									<p><img style="margin: 10px auto; display: block;" src="wa_images/2_(1)_1.png?v=1d5n903" width="143" height="209" alt="" title="" /></p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzoqqd07zwlzc" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jbzoqqd07wf8nk" class="wa-comptext clearfix">
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff; font-size: 18px;">BE Ortodontia</span></p>
									<p style="text-align: center;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff; font-size: 18px;"> Aparelho Porcelana </span></strong></p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzos2fy5n3wnc" class="row  ">
							<div class="col-xl-12 wa-item-rowspacer"></div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzoqwqm7zwloo" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jc3hvvzd6uegaw" class="wa-comptext clearfix">
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Por apenas</span></p>
									<p style="text-align: center;"><span style="font-size: 30px; font-family: Tahoma, Geneva, Kalimati, sans-serif;"><strong>R$ <span style="font-size: 50px;">129</span>,00 <span style="font-size: 25px;">mensais</span></strong></span></p>
									<p style="text-align: center; padding-left: 240px;"><span style="font-size: 8px;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">* No cartão de crédito</span></span></p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzouhq45m5zco" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jbzoului9u3bi0" class="wa-comptext clearfix">
									<p style="text-align: center;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 16px;">Você terá acesso a:</span></strong></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">-Avaliação inicial gratuita;</span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">-Documentação inicial completa</span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">-Diagnóstico</span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">-<strong>Aparelho ortodôntico Porcelana</strong></span><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">;</span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">-Colocação e manutenção </span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">do aparelho ortodôntico;</span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">- Clareamento Dental </span><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 10px;">*caseiro</span></p>
									<p style="text-align: center;"> </p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzown778eg11c" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-compbutton-padwrapper-jbzoxv0l3iq2dk" class="wa-compbutton-padwrapper">
									<div id="wa-compbutton-jbzoxv0l3iq2dk-halign">	<a id="wa-compbutton-jbzoxv0l3iq2dk" href="page7.html"  class="btn btn-primary wa-compbutton"  >ADQUIRA AGORA</a>
									</div></div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jcf4pxzt5h8w4g" class="row  ">
							<div class="col-xl-12 wa-item-rowspacer"></div>
						</div>
					</div>
				</div>
				<div class="clearfix visible-xs "></div>
				<div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
					<div id="wa-sub-container-jcjcotjg5bqsbc">
						<div id="wa-row-jbzologxarmw14" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jbzon3fw7wffig" class="wa-comptext clearfix">
									<p><img style="margin: 10px auto; display: block;" src="wa_images/4_(1)_1.png?v=1d5n903" width="141" height="206" alt="" title="" /></p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzor6m35n3w20" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jbzor6y87wfhds" class="wa-comptext clearfix">
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff; font-size: 18px;">BE Ortodontia</span></p>
									<p style="text-align: center;"><strong><span style="color: #ffffff; font-size: 18px; font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Aparelho Safira</span></strong></p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzos4cu5n3x8o" class="row  ">
							<div class="col-xl-12 wa-item-rowspacer"></div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzor9un7ch1oo" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jc3hw2zy2dpz80" class="wa-comptext clearfix">
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Por apenas</span></p>
									<p style="text-align: center;"><span style="font-size: 30px;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;"><span style="font-family: Tahoma, Geneva, Kalimati, sans-serif;">R$ <span style="font-size: 50px;">170</span>,00</span> <span style="font-family: Tahoma, Geneva, Kalimati, sans-serif; font-size: 25px;">mensais</span></span></strong></span></p>
									<p style="text-align: center; padding-left: 240px;"><span style="font-size: 8px;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">* No cartão de crédito</span></span></p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzouira5m5xa0" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jbzovxzd7pkte8" class="wa-comptext clearfix">
									<p style="text-align: center;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 16px;">Você terá acesso a:</span></strong></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">-Avaliação inicial gratuita;</span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">-Documentação inicial completa</span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">-Diagnóstico</span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">-<strong>Aparelho ortodôntico Safira</strong></span><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">;</span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">-Colocação e manutenção </span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">do aparelho ortodôntico;</span></p>
									<p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: medium;">- Clareamento Dental </span><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 10px;">*caseiro</span></p>
									<p style="text-align: center;"> </p>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jbzowxyb9r4y4g" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-compbutton-padwrapper-jbzoxw223iyenk" class="wa-compbutton-padwrapper">
									<div id="wa-compbutton-jbzoxw223iyenk-halign">	<a id="wa-compbutton-jbzoxw223iyenk" href="page7.html"  class="btn btn-primary wa-compbutton"  >ADQUIRA AGORA</a>
									</div></div>
							</div>
						</div>
					</div>
				</div> -->
			</div>
			<div class="wa-container-vspacer col-xl-12"></div>
			<div id="wa-row-jbzoy9tn871ngg" class="row  ">
				<div class="col-xl-12 wa-item-rowspacer"></div>
			</div>
		</div>
	</div>
	<div id="wa-container-wrapper-jcjcotjm5bqyhk" >
		<div id="wa-container-jcjcotjm5bqyhk" class="container  " >
			<div id="wa-row-jcdarw7561h11c" class="row  ">
				<div class="col-xl-12 wa-item-rowspacer"></div>
			</div>
			<div class="wa-container-vspacer col-xl-12"></div>
			<div id="wa-row-jcdarw7561h2io" class="row row-align  ">
				<div class="wa-subcontainer-wrapper  col-xs-12 col-sm-3 col-md-3 col-lg-3 " >
					<div id="wa-sub-container-jcjcotjm5br0sw">
						<div id="wa-row-jcdarw7561gznk" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jcdarw757k63zk" class="wa-comptext clearfix">
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;"><strong>Exames e procedimentos</strong></span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Check Up </span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Colocação de DIU</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Ecocardiograma</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Eletrocardiograma (ECG)</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Eletroencefalograma – EEG</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Escleroterapia (Tratamento de varizes)</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Espirometria</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Exames Laboratoriais</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Holter</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Infiltração de Joelhos</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Mamografia Digital</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">MAPA</span></p>
									<p> </p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Pacote Peeling</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Pequenas Cirurgias</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Prevenção Ginecológica</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Punção</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Radiografia (Raio X)</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Ressonância Magnética</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Teste Ergométrico</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Tomografia Computadorizada</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Ultrassom</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Ultrassom com Doppler</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Ultrassom Morfológico</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Ultrassom Obstétrico</span></p>
									<p><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #5c5c5c;">Ultrassom Translucência Nucal</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix visible-xs "></div>
				<div class="wa-subcontainer-wrapper  col-xs-12 col-sm-3 col-md-3 col-lg-3 " >
					<div id="wa-sub-container-jcjcotjn5br1ko">
						<div id="wa-row-jcdarw7561h14w" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
								<div id="wa-comptext-jcdarw757k66hc" class="wa-comptext clearfix">
									<p><span style="color: #5c5c5c;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">ESPECIALIDADES</span></strong></span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Mastologia</span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Ginecologia</span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Odontologia</span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Oftalmologia</span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Hematologia</span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Ortopedia</span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Otorrinolaringologia</span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Clínico Geral</span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Pneumologia</span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Arritmologia e Marca-passo</span></p>
									<p><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Cardiologia</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix visible-xs "></div>
				<div class="wa-subcontainer-wrapper  col-xs-12 col-sm-6 col-md-6 col-lg-6 " >
					<div id="wa-sub-container-jcjcotjo5br348">
						<div id="wa-row-jcdarw7561h1j4" class="row row-align  ">
							<div class=" col-xs-12 col-sm-5 col-md-5 col-lg-5 " >
								<div id="wa-comptext-jcdarw757k5wi8" class="wa-comptext clearfix">
									<p><span style="color: #5c5c5c; font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;"><strong>ODONTOLOGIA</strong></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Buco Maxilo facial</span></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Clareamento Dental</span></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Endodontia (Canal)</span></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Exodontia (Extração)</span></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Implantes</span></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Ortodontia (Aparelho)</span></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Periodontia (Raspagem)</span></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Profilaxia (Limpeza)</span></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Próteses Dentárias</span></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Restauração (Obturação)</span></span></p>
									<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Exames </span></span></p>
								</div>
							</div>
							<div class="clearfix visible-xs "></div>
							<div class="wa-subcontainer-wrapper  col-xs-12 col-sm-7 col-md-7 col-lg-7 " >
								<div id="wa-sub-container-jcjcotjp5bqrjk">
									<div id="wa-row-jcdarw7561gzk0" class="row row-align  ">
										<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
											<div id="wa-comptext-jcdj8ehub7h7n4" class="wa-comptext clearfix">
												<p><a title="" href="https://www.facebook.com/bemestarcentromedico/" ><img style="margin: 10px;" src="wa_images/logo face.png?v=1d5k718" width="45" height="45" alt="" title="" /></a><img style="margin: 10px;" src="wa_images/logo instagram.png?v=1d5k718" width="45" height="45" alt="" title="" /><a title="" href="https://api.whatsapp.com/send?1=pt_BR&phone=558589569455" ><img style="margin: 10px;" src="wa_images/whats.png?v=1d5k718" width="45" height="45" alt="" title="" /></a></p>
											</div>
										</div>
									</div>
									<div class="wa-container-vspacer col-xl-12"></div>
									<div id="wa-row-jcdarw7561gzr4" class="row row-align  ">
										<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
											<div id="wa-comptext-jcdarw757k5zmg" class="wa-comptext clearfix">
												<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; font-size: 16px;"><strong>WhatsApp:</strong></span></p>
												<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; font-size: 20px; color: #5c5c5c;"><strong>85 </strong></span><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;"><span style="font-size: 30px;"><strong>9.8956.9455</strong></span></span></p>
												<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c; font-size: 14px;"><strong>Central de Atendimento Parangaba:</strong></span></p>
												<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; font-size: 20px; color: #5c5c5c;"><strong>85 </strong></span><strong style="font-size: 20px; color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">3483-5757</strong></p>
												<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; color: #5c5c5c; font-size: 14px;"><strong>Central de Atendimento Centro:</strong></span></p>
												<p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; font-size: 20px; color: #5c5c5c;"><strong>85 </strong></span><span style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;"><span style="font-size: 20px;"><strong>3122.2887</strong></span></span></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="wa-container-vspacer col-xl-12"></div>
						<div id="wa-row-jcf3djdt7daayo" class="row row-align  ">
							<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 "  data-ratioWidth="766" data-ratioHeight="136" >
								<div id="wa-compimage-padwrapper-jcf3djwk2xauko" class="wa-compimage-padwrapper">

									<img id="wa-compimage-jcf3djwk2xauko" alt="" class="wa-image-component " src="wa_images/logo%20(1)%20copy.png?v=1d5n6te">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wa-container-vspacer col-xl-12"></div>
			<div id="wa-row-jcdarw7561h280" class="row  ">
				<div class="col-xl-12 wa-item-rowspacer"></div>
			</div>
		</div>
	</div>
	<a id="wa-anchor-bottom"></a>
	<script>
		document.getElementById("preloader").style.display = 'none';
	</script>
	<script src="wa_bootstrap/js/jquery.min.js?v=82" ></script>
	<script type="text/javascript">var wa$ = jQuery.noConflict()</script>
	<script src="wa_js/wa_bootstrap_util.js?v=82" ></script>
	<script src="wa_bootstrap/js/bootstrap.min.js?v=82" ></script>
	<script src="wa_js/waVariables_en.js?v=27" ></script>
	<script src="wa_menu/wa_menu.js?v=82" ></script>
	<script src="wa_menu/wa_search.js?v=82" ></script>
	<script src="wa_js/jquery.validate.min.js?v=82" ></script>
	<script src="wa_js/wa_common.js?v=82" ></script>
	<script src="wa_js/parallax.js?v=82" ></script>
