<!-- Bloco de envio de email -->
<div class="bloc-section">
    <div class="container text-center">
        <h5>Deseja enviar a NF-e (.pdf) por e-mail?</h5>
        <p>Adicione os e-mails dos destinatários separados por ",".</p>
        <div class="input-group mb-3">
            <div class="input-group-text">
                <input class="form-check-input mt-0" id="emailCheck" type="checkbox"
                    onclick="enviarEmail(this.id, 'emailCliente')" checked>
            </div>
            <textarea class="form-control validate-form" id="emailCliente"
                name="emailCliente"><?php echo $order->get_billing_email(); ?></textarea>
        </div>
    </div>
</div>