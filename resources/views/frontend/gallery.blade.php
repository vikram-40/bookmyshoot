@extends('frontend.layouts.app')

@section('title', 'Gallery')

@section('content')
<section class="py-5" style="margin-top: 70px;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-4" data-aos="fade-down">Our Gallery</h2>
            <div class="filter-buttons d-flex justify-content-center gap-2 flex-wrap" data-aos="fade-up">
                <button class="btn btn-outline-primary filter-btn active" data-category="all">All</button>
                <button class="btn btn-outline-primary filter-btn" data-category="wedding">Wedding</button>
                <button class="btn btn-outline-primary filter-btn" data-category="pre-wedding">Pre-wedding</button>
                <button class="btn btn-outline-primary filter-btn" data-category="events">Events</button>
            </div>
        </div>
        
        <div id="gallery-grid">
            @include('frontend.gallery.partials.grid', ['galleries' => $galleries])
        </div>
        
        <div id="gallery-pagination" class="d-flex justify-content-center mt-4">
            {{ $galleries->links() }}
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryGrid = document.getElementById('gallery-grid');
    const galleryPagination = document.getElementById('gallery-pagination');
    
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const category = this.dataset.category;
            loadGallery(category);
        });
    });
    
    function loadGallery(category) {
        fetch(`{{ route('gallery.filter') }}?category=` + category)
            .then(response => response.json())
            .then(data => {
                galleryGrid.innerHTML = data.html;
                galleryPagination.innerHTML = data.pagination;
                AOS.refresh();
            })
            .catch(error => console.error('Filter error:', error));
    }
});
</script>
@endsection