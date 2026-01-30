    <nav class="navbar navbar-expand-lg navbar-body bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Tour Travels</a>

            @auth
                <div class="dropdown">
                    <button class="btn btn-dark position-relative" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span id="count"
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" id="noty-list">
                        @forelse(auth()->user()->unreadNotifications as $notification)
                            <li>
                                <a class="dropdown-item border-bottom p-3"
                                    href="{{ route('notifications.read', $notification->id) }}">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">
                                            <p class="mb-0"><strong>{{ $notification->data['editor_name'] }}</strong></p>
                                            <small class="text-muted">{{ $notification->data['message'] }}
                                                ({{ $notification->data['package_name'] }})</small>
                                            <br>
                                            <small
                                                class="text-primary">{{ $notification->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="dropdown-item text-center py-3">Empty notifaction</li>
                        @endforelse
                    </ul>
                </div>

                <div class="row">
                    <div class="col-12 text-end d-flex justify-content-end gap-2 py-3">
                        <a class="btn btn-primary" href="{{ route('packages.create') }}">
                            Create Package
                        </a>
                        <a class="btn btn-primary" href="{{ route('profile') }}">
                            My Profile
                        </a>
                        <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                @endauth

            </div>
    </nav>
