<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

global $post;

// Custom Fields
$tipo_programa          = get_field( 'tipo_de_programa' );
$layout                 = 'secao_customizada';
$beneficios_do_programa = get_field( 'beneficios_do_programa' );
$beneficios_classe      = get_field( 'classe_do_beneficio' );
$classe_do_botao        = get_field( 'classe_do_botao' );
$btn_url                = ( get_field( 'url_do_botao' ) ) ? get_field( 'url_do_botao' ) : "/?add-to-cart={$post->ID}";
?>

<?php
   if ( post_password_required() ) {
    echo get_the_password_form();
    return;
   }
?>

<?php 
    /**
   * Product Banner
   */
   if ( $tipo_programa ) {
    include( locate_template( "templates/partials/content-programa-banner-{$tipo_programa}.php" ) );
   }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php if( have_rows( $layout ) ): ?>
    <?php while( have_rows( $layout ) ): the_row(); ?>
      <?php if( get_row_layout() == 'secao' ): ?>
          <div id="wa-container-wrapper-jckzd1ze5m09ew" >
            <div id="wa-container-jckzd1ze5m09ew" class="container  " >
              <div id="wa-row-jci1oox26xyo6w" class="row row-align  ">
                <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-6 col-md-6 col-lg-6 " >
                  <div id="wa-sub-container-jckzd1ze5m0a6o">
                    <div id="wa-row-jci1yh4r6xzcmw" class="row row-align  ">
                      <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 "  data-ratioWidth="851" data-ratioHeight="912" >
                        <div id="wa-compimage-padwrapper-jci21ikm5lhqz4" class="wa-compimage-padwrapper">
                          <img id="wa-compimage-jci21ikm5lhqz4" alt="" class="wa-image-component " src="<?= get_sub_field( 'imagem' )['url'] ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix visible-xs "></div>
                <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-6 col-md-6 col-lg-6 " >
                  <div id="wa-sub-container-jckzd1zf5m0gcw">
                    <div id="wa-row-jci1yheu6xzdtk" class="row row-align  ">
                      <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                        <div id="wa-comptext-jci1zuwl8dixlk" class="wa-comptext clearfix">
                          <p><span style="color: #f69a15; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;"><strong><span style="font-size: 40px;">Cuidar dos dentinhos</span></strong></span></p>
                          <p><span style="color: #f69a15; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;"><strong><span style="font-size: 40px;">desde cedo é garantia</span></strong></span></p>
                          <p><span style="color: #f69a15; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;"><strong><span style="font-size: 40px;">de sorriso mais saudável.</span></strong></span></p>
                        </div>
                      </div>
                    </div>
                    <div class="wa-container-vspacer col-xl-12"></div>
                    <div id="wa-row-jci1zqjq1xzbv4" class="row row-align  ">
                      <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                        <div id="wa-comptext-jci29thu5ry2qw" class="wa-comptext clearfix">
                          <p><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; font-size: 20px; color: #999999;"><?= remove_tags( get_sub_field( 'descricao' ) ) ?></span></p>
                        </div>
                      </div>
                    </div>
                    <div class="wa-container-vspacer col-xl-12"></div>
                    <div id="wa-row-jci1zr361xzahc" class="row row-align  ">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <div id="wa-container-wrapper-jckzd1zh5m0ci0" >
    <div id="wa-container-jckzd1zh5m0ci0" class="container  " >
      <div id="wa-row-jci203ts1yanyg" class="row  ">
        <div class="col-xl-12 wa-item-rowspacer"></div>
      </div>
      <div class="wa-container-vspacer col-xl-12"></div>
      <div id="wa-row-jc0z97j9arnl7s" class="row row-align  ">
        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
          <div id="wa-comptext-jc0z9dsy2hj5cg" class="wa-comptext clearfix">
            <p style="text-align: center;"><span style="color: #f69a15;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 40px;">Com esses programas você</span></strong></span></p>
            <p style="text-align: center;"><span style="color: #f69a15;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 40px;">terá acesso a:</span></strong></span></p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="wa-container-wrapper-jckzd1zi5m0h4o" >
    <div id="wa-container-jckzd1zi5m0h4o" class="container  " >
      <div id="wa-row-jcf0aw533pc5yw" class="row  ">
        <div class="col-xl-12 wa-item-rowspacer"></div>
      </div>
      <div class="wa-container-vspacer col-xl-12"></div>
      <div id="wa-row-jc11xuid2gakfk" class="row row-align  ">
        <?php foreach( $beneficios_do_programa as $beneficio_do_programa ): ?>
          <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
            <div id="<?= $beneficios_classe ?>">
              <div id="wa-row-jc11xuid2gajcg" class="row row-align  ">
                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                  <div id="wa-comptext-jc11xuid5xmn8o" class="wa-comptext clearfix">    
                    <p style="text-align: center;"><span style="font-size: 18px; color: #ffffff;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;"><?= $beneficio_do_programa['titulo_beneficios'] ?></span></strong></span></p>
                    <p style="text-align: center;"><span style="color: #ffffff;"> </span></p>
                    <?php foreach( $beneficio_do_programa['beneficios'] as $beneficio ): ?>
                      <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;"><?= $beneficio['beneficio'] ?></span></p>
                    <?php endforeach; ?>
                    <p style="text-align: center;"> </p>
                    <p style="text-align: center;"> </p>
                    <p style="text-align: center;"> </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix visible-xs "></div>

        <?php endforeach; ?>

        <!-- <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
          <div id="wa-sub-container-jckzd1zj5m0hwg">
            <div id="wa-row-jc11xuid2gajjk" class="row row-align  ">
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                <div id="wa-comptext-jc11xuid5xmohk" class="wa-comptext clearfix">
                  <p style="text-align: center;"><span style="font-size: 18px; color: #ffffff;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Emergência odontológica</span></strong></span></p>
                  <p style="text-align: center;"><span style="color: #ffffff;"> </span></p>
                  <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;">Emergência odontológica;</span></p>
                  <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;">consultas de urgência; </span></p>
                  <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;">Controle da dor ; Prescrição de medicamentos; Restaurações temporárias.</span></p>
                  <p style="text-align: center;"> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix visible-xs "></div>
        <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
          <div id="wa-sub-container-jckzd1zk5m073k">
            <div id="wa-row-jc11xuid2gal0w" class="row row-align  ">
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                <div id="wa-comptext-jc11xuid5xmp40" class="wa-comptext clearfix">
                  <p style="text-align: center;"><span style="font-size: 18px; font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;"><strong>Descontos em outros</strong></span></p>
                  <p style="text-align: center;"><span style="font-size: 18px; font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;"><strong>procedimentos</strong></span></p>
                  <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;"> </span></p>
                  <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;">Tabela de preços exclusiva</span></p>
                  <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;">para uma saúde bucal completa.</span></p>
                  <p style="text-align: center;"> </p>
                  <p style="text-align: center;"> </p>
                  <p style="text-align: center;"> </p>
                  <p style="text-align: center;"> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wa-container-vspacer col-xl-12"></div>
      <div id="wa-row-jci5aeqk4o381c" class="row row-align  ">
        <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
          <div id="wa-sub-container-jckzd1zl5m07vc">
            <div id="wa-row-jci5afsr8b0ljk" class="row row-align  ">
            </div>
          </div>
        </div>
        <div class="clearfix visible-xs "></div>
        <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
          <div id="wa-sub-container-jckzd1zl5tw7d4">
            <div id="wa-row-jci5aq164o33zk" class="row row-align  ">
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                <div id="wa-comptext-jci5aq168dk740" class="wa-comptext clearfix">
                  <p style="text-align: center;"><span style="font-size: 18px; color: #ffffff;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">Procedimentos Preventivos </span></strong></span><span style="font-size: 18px; color: #ffffff;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;">inclusos</span></strong></span></p>
                  <p style="text-align: center;"><span style="color: #ffffff;"> </span></p>
                  <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;">Crianças de até 5 anos;</span></p>
                  <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;">2 visitas ao dentista;</span></p>
                  <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff;">Ao fazer 6 anos, a criança fará parte automaticamente do programa.</span></p>
                  <p style="text-align: center;"> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix visible-xs "></div> -->
        <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
          <div id="wa-sub-container-jckzd1zm5tvznc">
            <div id="wa-row-jci5ag4g6yikns" class="row row-align  ">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="wa-container-wrapper-jckzd1zn5tvyvk" >
    <div id="wa-container-jckzd1zn5tvyvk" class="container  " >
      <div id="wa-row-jc0zixj0avkeq8" class="row  ">
        <div class="col-xl-12 wa-item-rowspacer"></div>
      </div>
    </div>
  </div>

  <div id="wa-container-wrapper-jckzd1zn5tw1yo" >
    <div id="wa-container-jckzd1zn5tw1yo" class="container  " >
      <div id="wa-row-jc0ziu147kjbh4" class="row row-align  ">
        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
          <div id="wa-compbutton-jc0zj3u97d8ep4-halign">  <a id="<?= $classe_do_botao ?>" 
            href="<?= $btn_url ?>" 
            class="btn btn-primary wa-compbutton"  > CONTRATAR ESTE PROGRAMA</a>
          </div></div>
      </div>
      <div class="wa-container-vspacer col-xl-12"></div>
      <div id="wa-row-jc11y8as2ksmv4" class="row  ">
        <div class="col-xl-12 wa-item-rowspacer"></div>
      </div>
    </div>
  </div>
  
  <div id="wa-container-wrapper-jckzd1zn5tvvsg" >
    <div id="wa-container-jckzd1zn5tvvsg" class="container  " >
      <div id="wa-row-jcf32jut5jk8r4" class="row row-align  ">
        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
          <div id="wa-comptext-jcf32jut87javs" class="wa-comptext clearfix">
            <p style="text-align: center;"><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">MANUAL DE ORIENTAÇÃO PARA CONTRATAÇÃO DO PROGRAMA                    GUIA DE LEITURA CONTRATUAL</span></p>
          </div>
        </div>
      </div>
      <div class="wa-container-vspacer col-xl-12"></div>
      <div id="wa-row-jcf32x7r3mk05s" class="row  ">
        <div class="col-xl-12 wa-item-rowspacer"></div>
      </div>
    </div>
  </div>

</div><!-- #product-<?php the_ID(); ?> -->

<?php// do_action( 'woocommerce_after_single_product' ); ?>
