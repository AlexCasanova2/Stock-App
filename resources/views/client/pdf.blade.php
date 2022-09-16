<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- @stack('styles')-->
        <title>TandemStock - {{$client->id}}_{{$client->name}}.pdf</title>
        <link href="{{ public_path('resources/css/pdf.css') }} rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body>

        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
              <h4 class="text-lg font-medium leading-6 text-gray-900">Tots els elements de: {{$client->name}}</h4>
              <p class="mt-1 max-w-2xl text-sm text-gray-500"></p>
            </div>
            @foreach ($elements as $element )
            <div class="border-t border-gray-200">
                <dl>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 item_title">Id</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">{{$element->id}}</dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 item_title">Element</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">{{$element->name}}</dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 item_title">Descripció</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">{{$element->description}}</dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 item_title">Estat</dt>
                    @if ($element->estat == '99')
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data"> No hi ha estats creats</dd>
                    @else
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data"> {{$element->estat}}</dd>
                    @endif
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 item_title">Stock</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">{{$element->stock}}</dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 item_title">Caracteristiques</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">{{$element->caracteristiques}}</dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500 item_title">Tipus</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">{{$element->tipus}}</dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500 item_title">Adquisició</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">{{$element->adquisicio->format('d/m/Y')}}</dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500 item_title">Proveidor</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">{{$element->proveidor->name ?? 'No hi ha cap proveidor assignat'}}</dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500 item_title">Area</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">{{$element->area->name ?? 'No hi ha cap area asignada'}}</dd>
                  </div>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500 item_title">Client</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">{{$element->client->name ?? 'No hi ha cap client assignat'}}</dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 item_title">Imatge</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 item_data">
                      <div class="flex w-0 flex-1 items-center item_data">
                        @if($element->imagen == null)
                          <span class="ml-2 w-0 flex-1 truncate">No hi ha cap imatge</span>
                        @endif
                      </div>
                      @if ($element->imagen)
                      <img src="{{public_path('uploads') . '/' . $element->imagen}}">
                      @endif
                     </dd>
                  </div>
                </dl>
              </div>
                -------------------------------------------------------------------------------------------------------------------------
              @endforeach
        </div>
    </body>
</html>

<style>
    
    .item_title{
        width:30%; 
        display:inline-block;
    }
    .item_data{
        display:inline-block;
    }
    img{
        margin-top: 20px;
        width:150px;
        height:150px;
    }
    h3{ 
    --tw-text-opacity: 1;
    color: rgb(17 24 39 / var(--tw-text-opacity));
    }
.py-5 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

.px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
}

.bg-white {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}
.shadow {
    --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
    --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
*, ::before, ::after {
    box-sizing: border-box;
    border-width: 0;
    border-style: solid;
    border-color: #e5e7eb;
}
.sm\:px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}
.text-gray-500 {
    --tw-text-opacity: 1;
    color: rgb(107 114 128 / var(--tw-text-opacity));
}

.font-medium {
    font-weight: 500;
}
.text-sm {
    font-size: 0.875rem;
    line-height: 1.25rem;
}
.sm\:gap-4 {
    gap: 1rem;
}
.sm\:grid-cols-3 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}
.sm\:grid {
    display: grid;
}
.border-gray-200 {
    --tw-border-opacity: 1;
    border-color: rgb(229 231 235 / var(--tw-border-opacity));
}
</style>