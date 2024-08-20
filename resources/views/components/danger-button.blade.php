<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-danger rounded-pill px-4 py-2 text-uppercase fw-semibold text-white shadow-sm']) }}>
  {{ $slot }}
</button>
