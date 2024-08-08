<div class="card card-custom">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">
                <div class="text-muted pt-2 font-size-sm"></div>
            </h3>
        </div>
    </div>
    <div class="card-body" style="overflow-x: auto;">
        <div class="col-md-6 offset-3">
            @include('includes.messages')
        </div>
        <!-- resources/views/livewire/add-page-form.blade.php -->

        <div>
                <div>

                    <input class="form-control" type="text" wire:model="page_name.pageName" placeholder="Page Name">
                    <input  class="form-control"type="text" wire:model="pages_value" placeholder="Page value">
                </div>
                <button class="btn btn-dark" wire:click="addPage">Add new Page</button>


        </div>

        <form
            wire:submit.prevent="store"
            method="post">

            <div class="card-body col-md-10 offset-1">
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="pageName">اسم الصفحة</label>
                        <select
                            wire:change="changePageName"
                            wire:model="pageName" id="pageName" class="form-select"
                            aria-label="Default select example">
                            <option selected value="home-page">الرئيسية</option>
                            <option value="about-page">من نحن</option>
                            <option value="services-page">خدماتنا</option>
                            <option value="portofilo-page">أعمالنا</option>
                            <option value="blog-page">المدونة</option>
                            <option value="jobs-page">التوظيف</option>
                            <option value="contact-page">اتصل بنا</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="keywords">الكلمات المفتاحية</label>
                    <input wire:model="keywords" id="keywords" type="text" name="keywords" class="form-control"/>
                </div>
                <div class="form-group col-md-12">
                    <label for="enKeywords">الكلمات المفتاحية باللفة الإنجليزية</label>
                    <input wire:model="englishKeywords" id="enKeywords" type="text" name="keywords" dir="ltr"
                           class="form-control"/>
                </div>
                <div class="form-group col-md-12 ">
                    <label for="details">التفاصيل</label>
                    <textarea wire:model="description" id="details" name="details_seo" class="form-control textarea_ms"
                              dir='rtl'></textarea>
                </div>
                <div class="form-group col-md-12 ">
                    <label for="enDetails">التفاصيل باللغة الإنجليزية</label>
                    <textarea wire:model="englishDescription" id="enDetails" name="details_en_seo"
                              class="form-control textarea_ms" dir="ltr"
                    ></textarea>
                </div>
            </div>
            <div class="box-footer col-md-12">
                <input type="submit" name="insert" class="btn btn-info pull-center" value="حفظ"/>
            </div>
        </form>
    </div>
</div>
