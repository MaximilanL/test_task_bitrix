{"version":3,"sources":["avatar.bundle.js"],"names":["this","BX","exports","main_core","_createForOfIteratorHelper","o","allowArrayLike","it","Symbol","iterator","Array","isArray","_unsupportedIterableToArray","length","i","F","s","n","done","value","e","_e","f","TypeError","normalCompletion","didErr","err","step","next","_e2","return","minLen","_arrayLikeToArray","Object","prototype","toString","call","slice","constructor","name","from","test","arr","len","arr2","_templateObject","data","babelHelpers","taggedTemplateLiteral","Avatar","classCallCheck","createClass","key","stringToHashCode","string","hashCode","charCodeAt","numberToRGB","index","color","toUpperCase","substring","stringToColor","build","config","arguments","undefined","size","fullName","email","whiteList","Set","has","replace","brokenName","split","abbreviation","avatar","Tag","render","style","backgroundColor","replaceElementWithAvatar","object","parent","parentNode","insertBefore","removeChild","replaceTagsWithAvatars","className","elements","document","getElementsByClassName","_iterator","_step","element","getAttribute","Mail"],"mappings":"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","file":"avatar.bundle.map.js"}