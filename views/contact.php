<?php

?>

<h1>contact</h1>

<form action="" method="post">
    <div class="mb-3">
        <label class="form-label">Subject</label>
        <input name="subject"  type="text" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>