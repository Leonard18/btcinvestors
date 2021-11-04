<div class="my-5">

    <div class="container-fluid p-5 rounded" style="background: {{ env('APP_WHITE_COLOR') }} !important;">
        <div class="section-header">
            <h3 class="pb-4 underline" style="color: {{ env('APP_PRIMARY_COLOR') }} !important;">Get in touch</h3>
            <p> We love to hear from you. Send a message and we will be happy to reply.
        </div>
       <div class="row">

            <form action="{{ route('ticket.store') }}" method="POST">
                @csrf
              <div class="input-field col s12 l4">
                <input type="text" name="name" id="name" class="validate rounded">
                <label for="name">Full Name</label>
              </div>
              <div class="input-field col s12 l4">
                <input type="email" name="email" id="email" class="validate rounded">
                <label for="email" data-error="wrong" data-success="right">Email</label>
              </div>
              <div class="input-field col s12 l4">
                <input type="tel" name="phone" id="phone" class="validate rounded">
                <label for="phone" data-error="wrong" data-success="right">Phone</label>
              </div>
              <div class="input-field col s12 l12">
                <input type="text" name="subject" id="subject" class="validate rounded">
                <label for="subject" data-error="wrong" data-success="right">Subject</label>
              </div>
              <div class="input-field col s12 l12">
                <textarea name="message" id="textarea1" class="materialize-textarea"></textarea>
                <label for="message">Message</label>
              </div>
              <button type="submit" class="bn btn-large blue darken-2">Send Message</button>
            </form>

       </div>
    </div>

</div>
