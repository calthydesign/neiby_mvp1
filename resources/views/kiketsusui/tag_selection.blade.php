<!-- resources/views/kiketsusui/tag_selection.blade.php -->
<div class="flex flex-wrap  mt-2">
    @php
    $tags = explode('、', $construction->meal_vegetables); // meal_vegetables の値を取得
    @endphp
    @foreach ($tags as $tag)
    <button type="button" name="selected_tags" value="{{ $tag }}" class="m-1 p-2 text-sm {{ in_array($tag, $selectedTags) ? 'bg-blue-800 text-white' : 'bg-blue-200 text-blue-800' }} rounded-full cursor-pointer font-roboto">
        {{ $tag }}
    </button>
    @endforeach

    @php
    $tags = explode('、', $construction->meal_fruits); // meal_fruits の値を取得
    @endphp
    @foreach ($tags as $tag)
    <button type="button" name="selected_tags" value="{{ $tag }}" class="m-1 p-2 text-sm {{ in_array($tag, $selectedTags) ? 'bg-blue-800 text-white' : 'bg-blue-200 text-blue-800' }} rounded-full cursor-pointer font-roboto">
        {{ $tag }}
    </button>
    @endforeach
    
    
    @php
    $tags = explode('、', $construction->meal_fish_meat); // meal_fish_meat の値を取得
    @endphp
    @foreach ($tags as $tag)
    <button type="button" name="selected_tags" value="{{ $tag }}" class="m-1 p-2 text-sm {{ in_array($tag, $selectedTags) ? 'bg-blue-800 text-white' : 'bg-blue-200 text-blue-800' }} rounded-full cursor-pointer font-roboto">
        {{ $tag }}
    </button>
    @endforeach
    
    
    @php
    $tags = explode('、', $construction->meal_seasonings); // meal_seasonings の値を取得
    @endphp
    @foreach ($tags as $tag)
    <button type="button" name="selected_tags" value="{{ $tag }}" class="m-1 p-2 text-sm {{ in_array($tag, $selectedTags) ? 'bg-blue-800 text-white' : 'bg-blue-200 text-blue-800' }} rounded-full cursor-pointer font-roboto">
        {{ $tag }}
    </button>
    @endforeach
    
    
    @php
    $tags = explode('、', $construction->meal_dried_goods); // meal_dried_goods の値を取得
    @endphp
    @foreach ($tags as $tag)
    <button type="button" name="selected_tags" value="{{ $tag }}" class="m-1 p-2 text-sm {{ in_array($tag, $selectedTags) ? 'bg-blue-800 text-white' : 'bg-blue-200 text-blue-800' }} rounded-full cursor-pointer font-roboto">
        {{ $tag }}
    </button>
    @endforeach
    
    
    @php
    $tags = explode('、', $construction->meal_tea); // meal_tea の値を取得
    @endphp
    @foreach ($tags as $tag)
    <button type="button" name="selected_tags" value="{{ $tag }}" class="m-1 p-2 text-sm {{ in_array($tag, $selectedTags) ? 'bg-blue-800 text-white' : 'bg-blue-200 text-blue-800' }} rounded-full cursor-pointer font-roboto">
        {{ $tag }}
    </button>
    @endforeach
    
        @php
    $tags = explode('、', $construction->exercise); // exercise の値を取得
    @endphp
    @foreach ($tags as $tag)
    <button type="button" name="selected_tags" value="{{ $tag }}" class="m-1 p-2 text-sm {{ in_array($tag, $selectedTags) ? 'bg-blue-800 text-white' : 'bg-blue-200 text-blue-800' }} rounded-full cursor-pointer font-roboto">
        {{ $tag }}
    </button>
    @endforeach
    
        @php
    $tags = explode('、', $construction->lifestyle); // lifestyle の値を取得
    @endphp
    @foreach ($tags as $tag)
    <button type="button" name="selected_tags" value="{{ $tag }}" class="m-1 p-2 text-sm {{ in_array($tag, $selectedTags) ? 'bg-blue-800 text-white' : 'bg-blue-200 text-blue-800' }} rounded-full cursor-pointer font-roboto">
        {{ $tag }}
    </button>
    @endforeach

    
</div>
