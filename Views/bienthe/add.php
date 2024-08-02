
<h1 class="app-page-title">Thêm biến thể </h1>
		
        
        <hr class="mb-4">
                <div class="row g-4 settings-section">
	                
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" action="?act=bien-the-post" method="post" enctype="multipart/form-data" >
								
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Kích cỡ</label>
									    <input type="text" class="form-control" id="setting-input-2" name="kich_co" placeholder="kích cỡ biến thể" value="<?= isset($kich_co) ? $kich_co:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['kich_co']) ? $error['kich_co'] : '';
                                        ?></span>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Màu sắc</label>
									    <input type="text" class="form-control" id="setting-input-2" name="mau_sac" placeholder="Màu sắc biến thể" value="<?= isset($mau_sac) ? $mau_sac:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['mau_sac']) ? $error['mau_sac'] : '';
                                        ?></span>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Giá</label>
									    <input type="text" class="form-control" id="setting-input-2" name="gia" placeholder="giá biến thể" value="<?= isset($gia) ? $gia:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['gia']) ? $error['gia'] : '';
                                        ?></span>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Số lượng trong kho</label>
									    <input type="text" class="form-control" id="setting-input-2" name="so_luong_trong_kho" placeholder="Số lượng trong kho" value="<?= isset($so_luong_trong_kho) ? $so_luong_trong_kho:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['so_luong_trong_kho']) ? $error['so_luong_trong_kho'] : '';
                                        ?></span>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Số lượng đã bán</label>
									    <input type="text" class="form-control" id="setting-input-2" name="so_luong_da_ban" placeholder="Số lượng đã bán" value="<?= isset($so_luong_da_ban) ? $so_luong_da_ban:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['so_luong_da_ban']) ? $error['so_luong_da_ban'] : '';
                                        ?></span>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Sản phẩm</label>
									    <input type="text" class="form-control" id="setting-input-2" name="id_sp" placeholder="sản phẩm" value="<?= isset($id_sp) ? $id_sp:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['id_sp']) ? $error['id_sp'] : '';
                                        ?></span>
									</div>
								    
									<button type="submit" class="btn app-btn-primary" name="submit" >Thêm biến thể</button>
							    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
                <hr class="my-4">
			    <hr class="my-4">
		    </div><!--//container-fluid-->