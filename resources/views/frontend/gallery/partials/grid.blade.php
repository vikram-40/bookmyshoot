<div class="row g-4">
    @foreach($galleries as $gallery)
        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="gallery-card position-relative overflow-hidden rounded-3 shadow h-100 cursor-pointer gallery-lightbox" data-gallery-title="{{ $gallery->title }}" data-gallery-desc="{{ $gallery->category ?? '' }}" style="height: 300px;">
                @if($gallery->type === 'video')
                    <video class="w-100 h-100 object-fit-cover" poster="https://images.unsplash.com/photo-1549576490-b0b4831e7f04?w=400">
                        <source src="{{ asset($gallery->file_path) }}" type="video/mp4">
                    </video>
                    <div class="play-overlay position-absolute top-50 start-50 translate-middle text-white">
                        <i class="bi bi-play-circle-fill display-3 opacity-75"></i>
                    </div>
                @else
                    <img src="{{ asset($gallery->file_path) }}" alt="{{ $gallery->title }}" class="w-100 h-100 object-fit-cover">
                @endif
                <div class="hover-overlay position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-0 d-flex align-items-center justify-content-center">
                    <i class="bi bi-zoom-in text-white display-4"></i>
                </div>
            </div>
            <div class="mt-3">
                <h6 class="mb-2 fw-semibold">{{ $gallery->title }}</h6>
                <div class="d-flex gap-2 flex-wrap">
                    @if($gallery->category)
                        <span class="badge bg-secondary text-capitalize">{{ $gallery->category }}</span>
                    @endif
                    <span class="badge bg-{{ $gallery->type === 'video' ? 'info' : 'primary' }} text-capitalize">
                        {{ $gallery->type }}
                    </span>
                </div>
            </div>
        </div>
    @endforeach
</div>
