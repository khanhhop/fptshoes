
<h1 class="app-page-title">Thêm mã giảm giá </h1>
		
        
        <hr class="mb-4">
                <div class="row g-4 settings-section">
	                
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" action="?act=ma-giam-gia-post" method="post" enctype="multipart/form-data" >
								    <!-- <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Tên mã giảm giá<span class="ms-2" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"  data-bs-placement="top" data-bs-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
  <circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
									    <input type="text" class="form-control" id="setting-input-1" name="ten" placeholder="Tên sản phẩm" value="<?= isset($ten) ? $ten:''  ?>">
                                       <span class="text-danger"><?php 
                                        echo isset($error['ten']) ? $error['ten'] : '';
                                        ?></span>
									   
									</div> -->
									
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Tên mã giảm giá</label>
									    <input type="text" class="form-control" id="setting-input-2" name="ma" placeholder="Tên mã giảm giá" value="<?= isset($ma) ? $ma:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['ma']) ? $error['ma'] : '';
                                        ?></span>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Phần trăm giảm</label>
									    <input type="text" class="form-control" id="setting-input-2" name="phantram_giam" placeholder="Phần trăm giảm" value="<?= isset($phantram_giam) ? $phantram_giam:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['phantram_giam']) ? $error['phantram_giam'] : '';
                                        ?></span>
									</div>
								    
									<button type="submit" class="btn app-btn-primary" name="submit" >Thêm mã giảm giá</button>
							    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
                <hr class="my-4">
			    <hr class="my-4">
		    </div><!--//container-fluid-->