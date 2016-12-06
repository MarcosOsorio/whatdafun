<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- saved from url=(0058)https://webpay3g.transbank.cl/webpayserver/bp_revision.cgi -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="cache-control" content="no-cache, must-revalidate">
        <meta name="expires" content="Wed, 01 Jan 1997 00:00:00 GMT">
        <title>Pago Seguro WebPay</title>
        <link href="../assets/webpayplus/styleCssView.css" rel="stylesheet" type="text/css">
        <script src="../assets/webpayplus/jquery.js" type="text/javascript"></script>
        <script src="../assets/webpayplus/funciones.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="wpcontenedor">
            <div id="wpcabecera">





    <div id="tiendalogo">

            <img src="../assets/webpayplus/logo.png" alt="">

    </div>

    <div id="wplogo">

            <img src="../assets/webpayplus/logowp2.gif" alt="logowp2">

    </div>


            </div>
            <div id="wpprincipal" style="border-top: none; border-right: 1px solid rgb(212, 212, 212); border-bottom: 1px solid rgb(212, 212, 212); border-left: 1px solid rgb(212, 212, 212); border-image: initial;">









<form id="timeOutForm" method="post" action="https://webpay3g.transbank.cl/webpayserver/wpTimeOut.cgi">
    <input type="hidden" name="token" value="e2718f28f9f3070d978d3b2e5bf82c4da0515fd10c8a2a3e3eb619c58c9a1852">
</form>
<script type="text/javascript">


    setTimeout('wpTimeOut()',600000);

    function wpTimeOut(){

        $("#timeOutForm").submit();

    }
</script>


<form id="webpayForm" name="webpayForm" action="https://webpay3g.transbank.cl/webpayserver/bp_control.cgi" method="POST" onsubmit="return false;">




            <script type="text/javascript">
                cambioEstilo('#EFEFF0','#D4D4D4','#F7F7F7');
            </script>



    <div id="wpcardtype">
        <div class="grupoPestanas">
            <div id="a" class="pestana_u">
                <b class="p1u"></b><b class="p2u" style="background: rgb(239, 239, 240);"></b><b class="p3u" style="background: rgb(239, 239, 240);"></b><b class="p4u" style="background: rgb(239, 239, 240);"></b>
                <div class="punselect" style="height: 45px; background: rgb(239, 239, 240);">
















Tarjeta de Crédito
<input type="radio" name="TBK_TIPO_TARJETA" id="TBK_TIPO_TARJETA" value="CREDIT_CARD" onclick="ajaxSubmitForm(&#39;change_card.cgi&#39;,&#39;webpayForm&#39;,&#39;wpcard&#39;)">
<br>


                                <img src="../assets/webpayplus/Visa.gif" alt="Visa">&nbsp;

                                <img src="../assets/webpayplus/MasterCard.gif" alt="MasterCard">&nbsp;

                                <img src="../assets/webpayplus/Magna.gif" alt="Magna">&nbsp;

                                <img src="../assets/webpayplus/AMEX.gif" alt="AMEX">&nbsp;

                                <img src="../assets/webpayplus/Diners.gif" alt="Diners">&nbsp;





                </div>
                <b class="pbu" style="background: rgb(239, 239, 240);"></b>
            </div>
            <div class="bordeInferior" style="width:10px;"></div>
            <div class="pestana_s">
                <b class="p1s"></b><b class="p2s" style="background: rgb(239, 239, 240);"></b><b class="p3s" style="background: rgb(239, 239, 240);"></b><b class="p4s" style="background: rgb(239, 239, 240);"></b>
                <div class="pselect" style="height: 45px; background: rgb(239, 239, 240);">


















Redcompra
<input type="radio" name="TBK_TIPO_TARJETA" id="TBK_TIPO_TARJETA" value="DEBIT_CARD" onclick="ajaxSubmitForm(&#39;change_card.cgi&#39;,&#39;webpayForm&#39;,&#39;wpcard&#39;)">
<br>
                                    <img src="../assets/webpayplus/rcompra.gif" alt="redcompra">&nbsp;







                </div>
                <b class="pbs" style="background: rgb(239, 239, 240);"></b>
            </div>
        </div>
    </div>
   <div id="wpcard">







<div id="montotrx" align="center">
<table class="EstiloMonto">
        <tbody><tr>
            <td align="left"><strong><span class="Estilo666">
                        Total a Pagar








$ <?php echo number_format($amount->pur_total,0,',','.');?></span></strong> </td>
        </tr>
        <tr>
            <td align="left"> <span class="Estilo6">Mil


                            pesos chilenos



            </span></td>
        </tr>
    </tbody></table>
</div>






    </div>
    <div id="error"></div>
    <div id="wpbotones">
        <table class="wptablacentrada" width="470" border="0">
            <tbody><tr>
                <td align="left">
                    <div id="wpbtn1">
                        <a href="checkout_4"><input type="button" class="btnanular" name="button" id="button3"></a>
                    </div>
                </td>
                <td align="right">
                    <div id="wpbtn2">
                        <a href="verify_payment"><input type="button" class="btnpagar" name="button" id="button"></a>
                    </div>
                </td>
            </tr>
        </tbody></table>
    </div>

    <input type="hidden" name="TBK_TOKEN" value="e2718f28f9f3070d978d3b2e5bf82c4da0515fd10c8a2a3e3eb619c58c9a1852">
    <input type="hidden" name="currentCommerceId" id="currentCommerceId" value="default">

</form>

            </div>
            <div id="wpfooter">




<div id="wpfooter">
    <div id="wpimage" align="right">

            <img src="../assets/webpayplus/Visa.gif" alt="Visa">&nbsp;

            <img src="../assets/webpayplus/MasterCard.gif" alt="MasterCard">&nbsp;

            <img src="../assets/webpayplus/Magna.gif" alt="Magna">&nbsp;

            <img src="../assets/webpayplus/AMEX.gif" alt="AMEX">&nbsp;

            <img src="../assets/webpayplus/Diners.gif" alt="Diners">&nbsp;


            <img src="../assets/webpayplus/rcompra.gif" alt="redcompra">&nbsp;

        <br>
        <img src="../assets/webpayplus/lock.gif" alt="logoCandado">
            <span class="Info">
            Esta transacción se está realizando sobre un sistema seguro.</span>

        <br>
        <table align="right">
            <tbody><tr>

                    <td>
                        <img src="../assets/webpayplus/verifiedVisa.gif" alt="Visa">
                    </td>


                    <td>
                        <img src="../assets/webpayplus/secureMasterCard.gif" alt="Master">
                    </td>

            </tr>
        </tbody></table>
    </div>
</div>
            </div>
        </div>


</body></html>
