
<h1 class="app-page-title">Sửa sản phẩm</h1>
		
        
        <hr class="mb-4">
                <div class="row g-4 settings-section">
	                
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" action="?act=san-pham-update&id=<?= $id_kh?>" method="post" enctype="multipart/form-data" >
								    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Tên sản phẩm<span class="ms-2" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"  data-bs-placement="top" data-bs-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
  <circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
									    <input type="text" class="form-control" id="setting-input-1" name="ten_sp" placeholder="Tên sản phẩm" value="<?= isset($ten_sp) ? $ten_sp:''  ?>">
                                       <span class="text-danger"><?php 
                                        echo isset($error['ten_sp']) ? $error['ten_sp'] : '';
                                        ?></span>
									   
									</div>

									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Ảnh sản phẩm</label>
									    <input type="file" class="form-control" id="setting-input-2" name="anh" placeholder="ảnh sản phẩm" value="<?= isset($anh) ? $anh:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['anh']) ? $error['anh'] : '';
                                        ?></span>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Mô tả sản phẩm</label>
									    <input type="text" class="form-control" id="setting-input-2" name="mo_ta" placeholder="Mô tả sản phẩm" value="<?= isset($mo_ta) ? $mo_ta:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['mo_ta']) ? $error['mo_ta'] : '';
                                        ?></span>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Chất liệu</label>
									    <input type="text" class="form-control" id="setting-input-2" name="chat_lieu" placeholder="Chất liệu sản phẩm" value="<?= isset($chat_lieu) ? $chat_lieu:''  ?>">
										<span class="text-danger"><?php 
                                        echo isset($error['chat_lieu']) ? $error['chat_lieu'] : '';
                                        ?></span>
									</div>
								    <div class="mb-3">
										
									    <label for="setting-input-3" class="form-label">Tên danh mục</label>
										<select name="id_dm" class="form-control">
										<!-- <option value="">--- Chọn ---</option> -->

											<?php 
                                            foreach ($danhMuc as $value) {
												extract($value);
                                            ?>
											<option value="<?= $id_dm?>" <?php isset($id_danhmuc) && $id_dm == $id_danhmuc ? "selected" : " " ?>><?= $ten_dm?></option>
											<?php
											}
											?>
                                        </select>
										
                                        <span class="text-danger"><?php 
                                        echo isset($error['id_dm']) ? $error['id_dm'] : '';
                                        ?></span>
									</div>
									<button type="submit" class="btn app-btn-primary" name="submit" >Sửa sản phẩm</button>
							    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
                <hr class="my-4">
			    <hr class="my-4">
		    </div><!--//container-fluid-->