@if (isset($content) and $content->contentBlocks->count())
@foreach ($content->contentBlocks as $index => $block)

<div class="form-group" data-block-index="{{ $index }}">
    <div class="row">
      <input type="hidden" name="block[{{ $index }}][id]" value="{{ $block->id }}">
      <div class="col-sm-1">
        @if ($index > 0)
          <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i> Remove</button>
        @else
          <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i> Add</button>
        @endif
      </div>
      <div class="col">
          <input type="text" class="form-control" name="block[{{ $index }}][title]" placeholder="Title" value="{{ $block->title }}" />
      </div>
    </div>
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col">
          <textarea class="form-control" name="block[{{ $index }}][body]" placeholder="Body" rows="6">{{ $block->body }}</textarea>
      </div>
    </div>
</div>

@endforeach
@else

<div class="form-group">
    <div class="row">
      <div class="col-sm-1">
          <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i> Add</button>
      </div>
      <div class="col">
          <input type="text" class="form-control" name="block[0][title]" placeholder="Title" />
      </div>
    </div>
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col">
          <textarea class="form-control" name="block[0][body]" placeholder="Body" rows="6"></textarea>
      </div>
    </div>
</div>

@endif

<div class="form-group invisible" id="blockTemplate">
    <div class="row">
      <div class="col-sm-1">
          <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i> Remove</button>
      </div>
      <div class="col">
          <input type="text" class="form-control" name="template_block_title" placeholder="Title" />
      </div>
    </div>
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col">
          <textarea class="form-control" name="template_block_body" placeholder="Body" rows="6"></textarea>
      </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var index = {{{ (isset($index)) ? $index += 1 : 0 }}};

    $('#contentForm')
        .on('click', '.addButton', function() {
          console.log('TEST');
            index++;
            var $template = $('#blockTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('invisible')
                                .removeAttr('id')
                                .attr('data-block-index', index)
                                .insertBefore($template);

            // Update the name attributes
            $clone
                .find('[name="template_block_title"]').attr('name', 'block[' + index + '][title]').end()
                .find('[name="template_block_body"]').attr('name', 'block[' + index + '][body]').end();

        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row  = $(this).parents('.form-group'),
                index = $row.attr('data-block-index');

            // Remove element containing the fields
            $row.remove();
        });
});
</script>