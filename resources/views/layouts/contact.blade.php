<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Contacto</h2>
    </div>
    <form id="contactForm">
        <div class="row align-items-stretch mb-5">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Tu nombre *" required="required" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Tu email *" required="required" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group mb-md-0">
                    <input class="form-control" id="phone" type="tel" placeholder="Tu telefono *" required="required" />
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-textarea mb-md-0">
                    <textarea class="form-control" id="message" placeholder="Tu mensaje *" required="required"></textarea>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
        </div>
        <div class="text-center">
            <div id="success"></div>
            <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Enviar mensaje</button>
        </div>
    </form>
</div>
