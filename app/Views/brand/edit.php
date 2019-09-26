<form action="<?php echo site_url('/brand/store'); ?>" method="post">
    <div class="form-group">
        <label for="brand">Brand :</label>
        <input type="text" value="{{ $br->brand }}" class="form-control" name="brand">
    </div>
    <br/>
    <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary">
    </div>
</form