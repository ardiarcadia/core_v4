<style type="text/css">
    .panel-heading.heading-login{
        border-bottom: 3px solid #0f9647;
    }
</style>
<div class="container" style="margin-top:20px;">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="panel panel-default is-shadow-panel">
                <div class="panel-heading heading-login">
                    <h3 class="panel-title"><img class="img-responsive" src="<?=site_url($this->l_skin->apps_config('logo'));?>"></h3></div>
                <form action="<?=site_url('login');?>" method="POST">
                <div class="panel-body">
                    <p class="text-center">Human Resource Information System</p>
                    <hr>
                    <?=$this->session->tempdata('notif_login');?>
                    <div class="form-group">
                        <label class="control-label"><i class="fa fa-user"></i> Username </label>
                        <input class="form-control" type="text" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><i class="fa fa-key"></i> Password </label>
                        <input class="form-control" type="password" placeholder="Password" name="password" required>
                        <?=$token;?> 
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-default btn-block" type="submit"><i class="fa fa-sign-in-alt"></i> LOGIN</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>