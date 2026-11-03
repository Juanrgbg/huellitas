{{--
    Formulario compartido por "Agregar" y "Editar" mascota perdida.
    Variables: $accion (url), $metodo (POST|PUT), $textoBoton, $mascota (modelo o null)
--}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perdidas-form-view.css') }}">
@endpush

@php $m = $mascota ?? null; @endphp

<form class="row g-4" action="{{ $accion }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($metodo !== 'POST') @method($metodo) @endif

    @if ($errors->any())
        <div class="col-12">
            <div class="alert alert-danger mb-0">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- COLUMNA IZQUIERDA -->
    <div class="col-lg-7">

        <div class="perdidas-caja mb-4">
            <h2 class="perdidas-subtitulo h6 fw-bold mb-3">Información de la mascota</h2>

            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label small fw-semibold">Nombre *</label>
                    <input class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                           value="{{ old('nombre', $m?->nombre) }}" placeholder="Ej. Luna" maxlength="100" required>
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Especie *</label>
                    <select class="form-select @error('especie') is-invalid @enderror" name="especie" required>
                        <option value="" disabled @selected(! old('especie', $m?->especie))>Selecciona una especie</option>
                        @foreach (array_keys(\App\Models\MascotaPerdida::ESPECIES) as $opcion)
                            <option value="{{ $opcion }}" @selected(old('especie', $m?->especie) === $opcion)>{{ $opcion }}</option>
                        @endforeach
                    </select>
                    @error('especie') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Sexo *</label>
                    <select class="form-select @error('sexo') is-invalid @enderror" name="sexo" required>
                        <option value="" disabled @selected(! old('sexo', $m?->sexo))>Selecciona un sexo</option>
                        @foreach (['Macho', 'Hembra'] as $opcion)
                            <option value="{{ $opcion }}" @selected(old('sexo', $m?->sexo) === $opcion)>{{ $opcion }}</option>
                        @endforeach
                    </select>
                    @error('sexo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Raza</label>
                    <input class="form-control @error('raza') is-invalid @enderror" name="raza"
                           value="{{ old('raza', $m?->raza) }}" placeholder="Ej. Mestizo, Siamés..." maxlength="100">
                    @error('raza') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Color *</label>
                    <input class="form-control @error('color') is-invalid @enderror" name="color"
                           value="{{ old('color', $m?->color) }}" placeholder="Ej. Café con blanco" maxlength="100" required>
                    @error('color') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="perdidas-caja">
            <h2 class="perdidas-subtitulo h6 fw-bold mb-3">¿Dónde y cuándo se perdió?</h2>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Fecha *</label>
                    <input type="date" class="form-control @error('fecha_perdida') is-invalid @enderror" name="fecha_perdida"
                           value="{{ old('fecha_perdida', $m?->fecha_perdida?->format('Y-m-d')) }}"
                           max="{{ now()->format('Y-m-d') }}" required>
                    @error('fecha_perdida') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Lugar *</label>
                    <input class="form-control @error('lugar_perdida') is-invalid @enderror" name="lugar_perdida"
                           value="{{ old('lugar_perdida', $m?->lugar_perdida) }}" placeholder="Barrio, calle o punto de referencia" maxlength="150" required>
                    @error('lugar_perdida') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Señas particulares *</label>
                    <textarea name="descripcion" maxlength="500" rows="4" required
                              class="form-control @error('descripcion') is-invalid @enderror"
                              placeholder="Collar, manchas, cicatrices, carácter, a qué responde...">{{ old('descripcion', $m?->descripcion) }}</textarea>
                    @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                @if ($m)
                    <div class="col-12">
                        <label class="form-label small fw-semibold">Estado *</label>
                        <select class="form-select @error('estado') is-invalid @enderror" name="estado" required>
                            @foreach (\App\Models\MascotaPerdida::ESTADOS as $opcion)
                                <option value="{{ $opcion }}" @selected(old('estado', $m->estado) === $opcion)>{{ $opcion }}</option>
                            @endforeach
                        </select>
                        @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                @endif
            </div>
        </div>

    </div>

    <!-- COLUMNA DERECHA -->
    <div class="col-lg-5">

        <div class="perdidas-caja mb-4">
            <h2 class="perdidas-subtitulo h6 fw-bold mb-3">
                Foto de la mascota {{ $m ? '(opcional)' : '(obligatoria)' }}
            </h2>

            @if ($m && $m->imagen_url)
                <img src="{{ $m->imagen_url }}" alt="Foto actual de {{ $m->nombre }}" class="perdidas-foto-actual img-fluid rounded-3 w-100 mb-3">
            @endif

            <label class="perdidas-subida d-block">
                <i class="bi bi-cloud-arrow-up"></i>
                <div class="fw-semibold mt-2">{{ $m ? 'Haz clic para cambiar la foto' : 'Haz clic para seleccionar una imagen' }}</div>
                <div id="nombreArchivoPerdida" class="small text-success"></div>
                <div class="small mt-3">Formatos: JPG, PNG. Tamaño máximo: 5MB</div>
                <input type="file" name="imagen" accept="image/png,image/jpeg" hidden @required(! $m)
                       onchange="document.getElementById('nombreArchivoPerdida').textContent = this.files[0]?.name ?? ''">
            </label>
            @error('imagen') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="perdidas-caja">
            <h2 class="perdidas-subtitulo h6 fw-bold mb-3">Datos de contacto</h2>

            <p class="small text-secondary">Se mostrarán los datos de tu perfil.</p>

            <p class="mb-1"><i class="bi bi-person me-2"></i>{{ trim(auth()->user()->name . ' ' . auth()->user()->apellido) }}</p>
            <p class="mb-1"><i class="bi bi-envelope me-2"></i>{{ auth()->user()->email }}</p>
            <p class="mb-3"><i class="bi bi-telephone me-2"></i>{{ auth()->user()->phone ?: 'Sin teléfono registrado' }}</p>

            @unless (auth()->user()->phone)
                <div class="alert alert-warning small">
                    Agrega tu teléfono para que puedan contactarte.
                    <a href="{{ route('profile.profileEdit') }}">Editar perfil</a>
                </div>
            @endunless

            <button type="submit" class="perdidas-btn-guardar btn w-100 py-2 text-light">
                <i class="bi bi-paw me-2"></i>{{ $textoBoton }}
            </button>
        </div>

    </div>
</form>
