<div class="row align-items-center">
    <div class="col-lg-9 col-xl-8">
        <div class="row align-items-center">
            <div class="col-md-4 my-2 my-md-0">
                <div class="input-icon">
                    <input type="text" class="form-control" placeholder="Search..."
                           id="kt_datatable_search_query">
                    <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                </div>
            </div>
            <div class="col-md-4 my-2 my-md-0">
                <div class="d-flex align-items-center">
                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                    <div class="dropdown bootstrap-select form-control dropup"><select class="form-control"
                                                                                       id="kt_datatable_search_status"
                                                                                       tabindex="null">
                            <option value="">All</option>
                            <option value="1">Pending</option>
                            <option value="2">Delivered</option>
                            <option value="3">Canceled</option>
                            <option value="4">Success</option>
                            <option value="5">Info</option>
                            <option value="6">Danger</option>
                        </select>
                        <button type="button" tabindex="-1"
                                class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown"
                                role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox"
                                aria-expanded="false" data-id="kt_datatable_search_status" title="All">
                            <div class="filter-option">
                                <div class="filter-option-inner">
                                    <div class="filter-option-inner-inner">All</div>
                                </div>
                            </div>
                        </button>
                        <div class="dropdown-menu"
                             style="max-height: 213.414px; overflow: hidden; min-height: 133px;">
                            <div class="inner show" role="listbox" id="bs-select-1" tabindex="-1"
                                 aria-activedescendant="bs-select-1-0"
                                 style="max-height: 201.414px; overflow-y: auto; min-height: 121px;">
                                <ul class="dropdown-menu inner show" role="presentation"
                                    style="margin-top: 0px; margin-bottom: 0px;">
                                    <li class="selected active"><a role="option"
                                                                   class="dropdown-item active selected"
                                                                   id="bs-select-1-0" tabindex="0"
                                                                   aria-setsize="7" aria-posinset="1"
                                                                   aria-selected="true"><span
                                                class="text">All</span></a>
                                    </li>
                                    <li><a role="option" class="dropdown-item" id="bs-select-1-1"
                                           tabindex="0"><span class="text">Pending</span></a></li>
                                    <li><a role="option" class="dropdown-item" id="bs-select-1-2"
                                           tabindex="0"><span class="text">Delivered</span></a></li>
                                    <li><a role="option" class="dropdown-item" id="bs-select-1-3"
                                           tabindex="0"><span class="text">Canceled</span></a></li>
                                    <li><a role="option" class="dropdown-item" id="bs-select-1-4"
                                           tabindex="0"><span class="text">Success</span></a></li>
                                    <li><a role="option" class="dropdown-item" id="bs-select-1-5"
                                           tabindex="0"><span class="text">Info</span></a></li>
                                    <li><a role="option" class="dropdown-item" id="bs-select-1-6"
                                           tabindex="0"><span class="text">Danger</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2 my-md-0">
                <div class="d-flex align-items-center">
                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                    <div class="dropdown bootstrap-select form-control dropup"><select class="form-control"
                                                                                       id="kt_datatable_search_type"
                                                                                       tabindex="null">
                            <option value="">All</option>
                            <option value="1">Online</option>
                            <option value="2">Retail</option>
                            <option value="3">Direct</option>
                        </select>
                        <button type="button" tabindex="-1"
                                class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown"
                                role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox"
                                aria-expanded="false" data-id="kt_datatable_search_type" title="All">
                            <div class="filter-option">
                                <div class="filter-option-inner">
                                    <div class="filter-option-inner-inner">All</div>
                                </div>
                            </div>
                        </button>
                        <div class="dropdown-menu"
                             style="max-height: 213.414px; overflow: hidden; min-height: 133px;">
                            <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1"
                                 aria-activedescendant="bs-select-2-0"
                                 style="max-height: 201.414px; overflow-y: auto; min-height: 121px;">
                                <ul class="dropdown-menu inner show" role="presentation"
                                    style="margin-top: 0px; margin-bottom: 0px;">
                                    <li class="selected active"><a role="option"
                                                                   class="dropdown-item active selected"
                                                                   id="bs-select-2-0" tabindex="0"
                                                                   aria-setsize="4" aria-posinset="1"
                                                                   aria-selected="true"><span
                                                class="text">All</span></a>
                                    </li>
                                    <li><a role="option" class="dropdown-item" id="bs-select-2-1"
                                           tabindex="0"><span class="text">Online</span></a></li>
                                    <li><a role="option" class="dropdown-item" id="bs-select-2-2"
                                           tabindex="0"><span class="text">Retail</span></a></li>
                                    <li><a role="option" class="dropdown-item" id="bs-select-2-3"
                                           tabindex="0"><span class="text">Direct</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
    </div>
</div>
/*
*  php artisan resource-file:create City --fields=id,name,code,province_code,psgc_code,region_desc
*  php artisan create:scaffold City  --layout-name="layouts.base" --with-migration
* */

/*
*  php artisan resource-file:create Barangay --fields=id,name,code,city_code,province_code,region_code
*  php artisan create:scaffold Barangay  --layout-name="layouts.base" --with-migration
* */

/*
*  php artisan resource-file:create Province --fields=id,name,code,psgc_code,region_code
*  php artisan create:scaffold Province  --layout-name="layouts.base" --with-migration
* */
/*
*  php artisan resource-file:create Region --fields=id,name,code,psgc_code
*  php artisan create:scaffold Region  --layout-name="layouts.base" --with-migration
* */

/*
*  php artisan resource-file:create ServiceCategory --fields=id,name,is_active,description
*  php artisan create:scaffold ServiceCategory  --layout-name="layouts.base" --with-migration
php artisan resource-file:from-database User
php artisan create:scaffold User  --layout-name="layouts.base"
* */
