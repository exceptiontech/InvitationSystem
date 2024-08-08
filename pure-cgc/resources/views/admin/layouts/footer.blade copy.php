
<!--end::Demo Panel-->
<script>var HOST_URL = "";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>
var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
    },
    "colors": {
        transparent: 'transparent',
      current: 'currentColor',
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            }, "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        },
        "red": {
            "red-50": "#FEF2F2",
            "red-100": "#FEE2E2",
            "red-200": "#FECACA",
            "red-300": "#FCA5A5",
            "red-400": "#F87171",
            "red-500": "#EF4444",
            "red-600": "#DC2626",
            "red-700": "#B91C1C",
            "red-800": "#991B1B",
            "red-900": "#7F1D1D"
        },
        "yellow": {
            "yellow-50": "#FFFBEB",
            "yellow-100": "#FEF3C7",
            "yellow-200": "#FDE68A",
            "yellow-300": "#FCD34D",
            "yellow-400": "#FBBF24",
            "yellow-500": "#F59E0B",
            "yellow-600": "#D97706",
            "yellow-700": "#B45309",
            "yellow-800": "#92400E",
            "yellow-900": "#78350F"
        },
        "blue": {
            "blue-50": "#EFF6FF",
            "blue-100": "#DBEAFE",
            "blue-200": "#BFDBFE",
            "blue-300": "#93C5FD",
            "blue-400": "#60A5FA",
            "blue-500": "#3B82F6",
            "blue-600": "#2563EB",
            "blue-700": "#1D4ED8",
            "blue-800": "#1E40AF",
            "blue-900": "#1E3A8A"
        },
        "pink": {
            "pink-50": "#FDF2F8",
            "pink-100": "#FCE7F3",
            "pink-200": "#FBCFE8",
            "pink-300": "#F9A8D4",
            "pink-400": "#F472B6",
            "pink-500": "#EC4899",
            "pink-600": "#DB2777",
            "pink-700": "#BE185D",
            "pink-800": "#9D174D",
            "pink-900": "#831843"
        }
    },
    "font-family": "Cairo"//Poppins

};

</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{url('admin/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{url('admin/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{url('admin/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle--><!--begin::Page Vendors(used by this page)-->
<?php  if(isset($script_datatables)){ ?>
    @if(Auth::user()->user_lang == 'ar')
        <script src="{{url('admin/plugins/custom/datatables/datatables.bundle.rtl.js')}}"></script>
    @else
        <script src="{{url('admin/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    @endif
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{url('admin/js/pages/crud/datatables/basic/headers.js')}}"></script>
<!--end::Page Scripts-->
<?php  }elseif(isset($script_wizard)){ ?>
<script src="{{url('admin/js/pages/custom/wizard/wizard-1.js')}}"></script>
<?php  } if(isset($script_calendar)){ ?>
<!--begin::Page Vendors(used by this page)-->
<script src="{{url('admin/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors-->

<!--end::Page Scripts-->
<?php  } ?>
<!--begin::Page Scripts(used by this page)-->
<script src="{{url('admin/js/pages/widgets.js')}}"></script>
<?php if(isset($multi_select)){ ?>
<script src="{{url('admin/js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>
<?php  }
if(isset($script_select2_js)){?>
<script src="{{url('admin/js/pages/crud/forms/widgets/select2.js')}}"></script>
<?php } ?>
@isset($script_editor)
<script src="{{ url('admin/editor_html/ckeditor.js')}}"></script>
<script src="{{ url('admin/editor_html/adapters/jquery.js')}}"></script>
   <script>
   $( document ).ready( function() {
       $( 'textarea.editor1' ).ckeditor();
   } );

   </script>
@endisset




