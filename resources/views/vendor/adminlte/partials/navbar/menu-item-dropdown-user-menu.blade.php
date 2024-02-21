@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )
@php( $profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout') )
@php( $notifications = View::getSection('notifications') ?? config('adminlte.notifications', 'logout') )

@if (config('adminlte.usermenu_profile_url', false))
    @php( $profile_url = Auth::user()->adminlte_profile_url() )
@endif

@if (config('adminlte.notifications', false))
    @php( $notifications = Auth::user()->count_notificacion() )
@endif

@if (config('adminlte.use_route_url', false))
    @php( $profile_url = $profile_url ? route($profile_url) : '' )
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
@else
    @php( $profile_url = $profile_url ? url($profile_url) : '' )
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
@endif

<li>
    <!-- Suponiendo que es el número de notificaciones del usuario -->
    <div id="notification-logo" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.75 15.8385V13.0463C22.7471 10.8855 21.9385 8.80353 20.4821 7.20735C19.0258 5.61116 17.0264 4.61555 14.875 4.41516V2.625C14.875 2.39294 14.7828 2.17038 14.6187 2.00628C14.4546 1.84219 14.2321 1.75 14 1.75C13.7679 1.75 13.5454 1.84219 13.3813 2.00628C13.2172 2.17038 13.125 2.39294 13.125 2.625V4.41534C10.9736 4.61572 8.97429 5.61131 7.51794 7.20746C6.06159 8.80361 5.25291 10.8855 5.25 13.0463V15.8383C4.26257 16.0412 3.37529 16.5784 2.73774 17.3593C2.10019 18.1401 1.75134 19.1169 1.75 20.125C1.75076 20.821 2.02757 21.4882 2.51969 21.9803C3.01181 22.4724 3.67904 22.7492 4.375 22.75H9.71346C9.91521 23.738 10.452 24.6259 11.2331 25.2636C12.0142 25.9013 12.9916 26.2497 14 26.2497C15.0084 26.2497 15.9858 25.9013 16.7669 25.2636C17.548 24.6259 18.0848 23.738 18.2865 22.75H23.625C24.321 22.7492 24.9882 22.4724 25.4803 21.9803C25.9724 21.4882 26.2492 20.821 26.25 20.125C26.2486 19.117 25.8998 18.1402 25.2622 17.3594C24.6247 16.5786 23.7374 16.0414 22.75 15.8385ZM7 13.0463C7.00232 11.2113 7.73226 9.45223 9.02974 8.15474C10.3272 6.85726 12.0863 6.12732 13.9212 6.125H14.0788C15.9137 6.12732 17.6728 6.85726 18.9703 8.15474C20.2677 9.45223 20.9977 11.2113 21 13.0463V15.75H7V13.0463ZM14 24.5C13.4589 24.4983 12.9316 24.3292 12.4905 24.0159C12.0493 23.7026 11.716 23.2604 11.5363 22.75H16.4637C16.284 23.2604 15.9507 23.7026 15.5095 24.0159C15.0684 24.3292 14.5411 24.4983 14 24.5ZM23.625 21H4.375C4.14298 20.9999 3.9205 20.9076 3.75644 20.7436C3.59237 20.5795 3.50014 20.357 3.5 20.125C3.50076 19.429 3.77757 18.7618 4.26969 18.2697C4.76181 17.7776 5.42904 17.5008 6.125 17.5H21.875C22.571 17.5008 23.2382 17.7776 23.7303 18.2697C24.2224 18.7618 24.4992 19.429 24.5 20.125C24.4999 20.357 24.4076 20.5795 24.2436 20.7436C24.0795 20.9076 23.857 20.9999 23.625 21Z" fill="#fff"/>
        </svg>
        <span class="badge"
        style=" position: absolute;
                margin: -8px 0 0 -20px;
                padding: 0px 0 0 6px;">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="16" cy="16" r="14.5" fill="#DD2F6E" stroke="white" stroke-width="3"/>
                <text x="50%" y="60%" text-anchor="middle" alignment-baseline="middle" fill="white" font-size="12">
                    {{ $notifications }}
                </text>
            </svg>
        </span>
    </div>
</li>

<li class="nav-item dropdown user-menu">

    {{-- User menu toggler --}}
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        @if(config('adminlte.usermenu_image'))
            <img src="{{ Auth::user()->adminlte_image() }}"
                class="user-image img-circle elevation-2"
                alt="{{ Auth::user()->name }}">
        @endif
        <span @if(config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>
            {{ Auth::user()->name }}
        </span>
    </a>

    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        {{-- User menu header --}}
        @if(!View::hasSection('usermenu_header') && config('adminlte.usermenu_header'))
            <li class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }}
                @if(!config('adminlte.usermenu_image')) h-auto @endif">
                @if(config('adminlte.usermenu_image'))
                    <img src="{{ Auth::user()->adminlte_image() }}"
                        class="img-circle elevation-2"
                        alt="{{ Auth::user()->name }}">
                @endif
                <p class="@if(!config('adminlte.usermenu_image')) mt-0 @endif">
                    {{ Auth::user()->name }}
                    @if(config('adminlte.usermenu_desc'))
                        <small>{{ Auth::user()->adminlte_desc() }}</small>
                    @endif
                </p>
            </li>
        @else
            @yield('usermenu_header')
        @endif

        {{-- Configured user menu links --}}
        @each('adminlte::partials.navbar.dropdown-item', $adminlte->menu("navbar-user"), 'item')

        {{-- User menu body --}}
        @hasSection('usermenu_body')
            <li class="user-body">
                @yield('usermenu_body')
            </li>
        @endif

        {{-- User menu footer --}}
        <li class="user-footer">
            @if($profile_url)
                <a href="{{ $profile_url }}" class="btn btn-default btn-flat">
                    <i class="fa fa-fw fa-user text-lightblue"></i>
                    {{ __('adminlte::menu.profile') }}
                </a>
            @endif
            <a class="btn btn-default btn-flat float-right @if(!$profile_url) btn-block @endif"
                href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off text-red"></i>
                {{ __('adminlte::adminlte.log_out') }}
            </a>
            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                @if(config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
            </form>
        </li>

    </ul>

</li>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Agregar evento de clic al logo para mostrar más detalles
    $('#notification-logo').on('click', function() {
        // Realiza una solicitud AJAX para obtener los detalles de las notificaciones
        $.ajax({
        url: 'getNotifications',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Aquí puedes mostrar los detalles de las notificaciones en una ventana emergente o en una sección dedicada de tu PWA
            // Por ejemplo, puedes usar un modal de Bootstrap o cualquier otra librería para mostrar la información.
            // Aquí hay un ejemplo básico para mostrar las notificaciones en un alert():
            // Creamos el contenido del modal con la información que necesitas
            var modalContent = '';


            response.data.forEach(function(item) {

                // Convertimos el valor JSON en un objeto JavaScript
                var itemObj = JSON.parse(JSON.stringify(item));

                // Accedemos a la respuesta dentro del objeto
                var respuesta = itemObj.data;

                // Ahora puedes acceder a cada propiedad de la respuesta
                var pilot_id = respuesta.pilot_id;
                var assistant_id_one = respuesta.assistant_id_one;
                var assistant_id_two = respuesta.assistant_id_two;
                var id_cliente = respuesta.id_cliente;
                var is_admin = respuesta.is_admin;
                var created_at = respuesta.created_at;

                /* console.log(pilot_id); // Mostrará: "piloto 1"
                console.log(created_at); // Mostrará: "2023-07-18" */

                // console.log('respuesta', respuesta)

                /* modalContent += `
                    <p>Se te asignó una operación, ${pilot_id}, cuentas con la ayuda de ${assistant_id_one} y ${assistant_id_two}, esta operacion ha sido creada ${created_at}</p>
                    <hr>
                `; */
                if (is_admin === 1) {
                    // Nensaje para el admin
                    modalContent += `
                        <p>Hay cambios en la operacion del piloto, ${pilot_id}, para el cliente ${id_cliente},
                            ${(assistant_id_two === null) ? `el Tanqueador ${assistant_id_one}, esta operación ha sido creada ${created_at}` :
                            `el Tanqueador ${assistant_id_one} y ${assistant_id_two}, esta operación ha sido creada ${created_at}`}</p>
                        <hr>
                    `;
                } else {
                    // Nensaje para el piloto
                    modalContent += `
                        <p>Se te asignó una operación, ${pilot_id}, para el cliente ${id_cliente},
                            ${(assistant_id_two === null) ? `cuentas con la ayuda de ${assistant_id_one}, esta operación ha sido creada ${created_at}` :
                            `cuentas con la ayuda de ${assistant_id_one} y ${assistant_id_two}, esta operación ha sido creada ${created_at}`}</p>
                        <hr>
                    `;
                }
            });

            // Creamos el modal usando Bootstrap y mostramos el contenido dentro de él
            var modal = `
            <div class="modal fade" id="notificationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tus notificaciones</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ${modalContent}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            `;

            // Agregamos el modal al final del body
            $('body').append(modal);

            // Mostramos el modal
            $('#notificationModal').modal('show');

            // Eliminamos el modal del DOM cuando se cierre
            $('#notificationModal').on('hidden.bs.modal', function() {
            $(this).remove();
            });
        },
        error: function(error) {
            console.error(error);
        }
        });
    });
</script>
